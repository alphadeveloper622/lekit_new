<?php

namespace App\Http\Controllers\Api\Seller\V100;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddOnResource;
use App\Http\Resources\PageResource;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Language;
use App\Models\User;
use App\Repositories\Admin\Page\PageRepository;
use App\Repositories\Interfaces\Admin\AddonInterface;
use App\Repositories\Interfaces\Admin\SellerProfileInterface;
use App\Traits\ApiReturnFormatTrait;
use App\Traits\SendMailTrait;
use App\Traits\SmsSenderTrait;
use App\Utility\AppSettingUtility;
use Brian2694\Toastr\Facades\Toastr;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Support\Facades\DB;
use Sentinel;
use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    use ApiReturnFormatTrait,SmsSenderTrait,SendMailTrait;

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email'     => 'required|max:255',
                'password'  => 'required|min:5|max:30',
            ]);

            if ($validator->fails()) {
                return $this->responseWithError(__('Required field missing'), $validator->errors(), 422);
            }

            $user = User::where('email', $request->email)->where('user_type','seller')->first();

            if(blank($user)) {
                return $this->responseWithError( __('User not found'), [], 422);
            } elseif($user->is_user_banned == 1) {
                return $this->responseWithError( __('Your account has been banned'), [], 401);
            }

            if ($user->is_deleted == 1)
            {
                return $this->responseWithError( __('User not found'), [], 422);
            }

            if ($user->status == 0):
                return $this->responseWithError( __('Your account status is inactive'), []);
            elseif ($user->status == 2):
                return $this->responseWithError( __('Your account is suspend'), []);
            endif;

            $credentials = $request->only('email', 'password');

            try {
                if (!$token = \Tymon\JWTAuth\Facades\JWTAuth::attempt($credentials)) {
                    return $this->responseWithError(__('Invalid credentials'), [], 401);
                }
            } catch (JWTException $e) {
                return $this->responseWithError(__('Unable to login, please try again'), [], 422);

            } catch (ThrottlingException $e) {
                return $this->responseWithError(__('Suspicious activity on your ip, try after').' '. $e->getDelay() .' '.  __('seconds'), [], 422);

            } catch (NotActivatedException $e) {
                return $this->responseWithError(__('Account is not activated. Verify your account first'),[],400);

            } catch (\Exception $e) {
                return $this->responseWithError($e->getMessage(), [], 500);
            }

            try {
                Sentinel::authenticate($request->all());
            } catch (NotActivatedException $e) {
                JWTAuth::invalidate(JWTAuth::getToken());
                return $this->responseWithError(__('Your account is not verified.Please verify your account.'),[],500);
            }

            if (empty($user->sellerProfile->verified_at)):
                Sentinel::logout();
                JWTAuth::invalidate(JWTAuth::getToken());
                return $this->responseWithError( __('need_admin_approval'), [], 401);
            endif;

            $data['token']          = $token;
            $data['id']             = $user->id;
            $data['first_name']     = $user->first_name;
            $data['last_name']      = $user->last_name;
            $data['image']          = $user->profile_image;
            $data['phone']          = nullCheck($user->phone);
            $data['email']          = nullCheck($user->email);

            return $this->responseWithSuccess(__('Login Successfully'),$data,200);

        } catch (\Exception $e){
            return $this->responseWithError(__($e->getMessage()),500);
        }
    }

    public function register(Request $request, SellerProfileInterface $seller)
    {
        $validator = Validator::make($request->all(), [
            'email'         => 'required|unique:users,email|email',
            'first_name'    => 'required|min:2',
            'last_name'     => 'required|min:2',
            'phone'         => 'required|unique:users,phone|min:6',
            'password'      => 'required|confirmed|min:6|max:50',
            'shop_name'     => 'required',
            'address'       => 'required'
        ]);

        if(str_contains($validator->errors()->first(),'taken')){
            $message = 'The field has already been taken';
        }else {
            $message = 'Required field is missing';
        }
        if ($validator->fails()) {
            return $this->responseWithError(__($message), $validator->errors(), 422);
        }
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['user_type'] = 'seller';
            $data['phone'] = str_replace(' ','',$request->phone);

            if (settingHelper('disable_email_confirmation') == 1)
            {
                $message = __("You're not Approved by Admin, Wait for the Approval");
                $sellerData = Sentinel::registerAndActivate($data);
            }
            else{
                $sellerData = Sentinel::register($data);
                $activation = Activation::create($sellerData);
                $message =  __('Check your mail to verify your account');
            }

            $request['user_id']     = $sellerData->id;
            $request['shop_name']   = $request->shop_name;
            $request['address']     = $request->address;

            $seller->store($request);
            Sentinel::logout();
            session()->flush();
            session()->regenerate();

            if (settingHelper('disable_email_confirmation') != 1) {
                $this->sendmail($request->email, 'Registration', $sellerData, 'email.auth.activate-account-email',url('/') . '/activation/' . $request->email . '/' . $activation->code);
            }
            DB::commit();
            return $this->responseWithSuccess($message);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function logout(Request $request)
    {
        try {
            Sentinel::logout();
            JWTAuth::invalidate(JWTAuth::getToken());
            return $this->responseWithSuccess(__('Logout Successfully'),[],200);
        } catch (JWTException $e) {
            JWTAuth::unsetToken();
            return $this->responseWithError(__('Failed to logout'), [], 500);
        }
    }

    public function getOtp(Request $request): \Illuminate\Http\JsonResponse
    {
        try {

            if (settingHelper('disable_otp_verification') == 1):
                return $this->responseWithError(__('OTP Verification is Disabled'), [], 401);
            endif;

            $validator = Validator::make($request->all(), [
                'phone'     => 'required|max:255',
            ]);

            if ($validator->fails()) {
                return $this->responseWithError(__('Required field missing'), $validator->errors(), 422);
            }

            $request['phone'] = str_replace(' ','',$request->phone);

            $user  = User::where('phone', $request['phone'])->where('user_type','seller')->first();

            if (blank($user)):
                return $this->responseWithError(__('User Not found'), [], 500);
            endif;

            if($user->status == 0):
                return $this->responseWithError(__('Your account status is inactive'), [], 500);

            elseif($user->status == 2):
                return $this->responseWithError(__('Your account is suspend'), [], 500);

            elseif(!Activation::completed($user)):
                return $this->responseWithError(__('Your account is not verified.Please verify your account.'), [], 500);
            endif;

            $sms_templates  = AppSettingUtility::smsTemplates();

            $sms_template   = $sms_templates->where('tab_key','login')->first();
            $otp            = rand(10000,99999);
            $sms_body       = str_replace('{otp}', $otp, $sms_template->sms_body);
            if (addon_is_activated('otp_system')):
                if ($this->send($request['phone'], $sms_body, $sms_template->template_id)):
                    $user->otp  = $otp;
                    $user->save();
                    return $this->responseWithSuccess(__('Otp send successfully'),[],200);
                else:
                    return $this->responseWithSuccess(__('Unable to send otp'),[],200);
                endif;
            else:
                return $this->responseWithSuccess(__('Service is unavailable'),[],200);
            endif;
        } catch (\Exception $e){
            return $this->responseWithError($e->getMessage(),[],500);
        }
    }
    public function verifyLoginOtp(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            if (settingHelper('disable_otp_verification') == 1)
            {
                $validator = Validator::make($request->all(), [
                    'phone'     => 'required|max:255'
                ]);

            }
            else{
                $validator = Validator::make($request->all(), [
                    'phone'     => 'required|max:255',
                    'otp'       => 'required'
                ]);

            }

            if ($validator->fails()) {
                return $this->responseWithError(__('Required field missing'), $validator->errors(), 422);
            }

            $request['phone'] = str_replace(' ','',$request->phone);

            $user = User::where('phone', $request->phone)->first();

            if (blank($user)) {
                return $this->responseWithError( __('User not found'), [], 422);
            }
            if($user->is_user_banned == 1) {
                return $this->responseWithError( __('Your account has been banned'), [], 401);
            }
            if ($user->status == 0):
                return $this->responseWithError(__('You Are not Activated Yet'), [], 401);
            elseif ($user->status == 2):
                return $this->responseWithError(__('Your account is suspend'), [], 401);
            endif;

            if (settingHelper('disable_otp_verification') != 1 && $user->otp != $request->otp):
                return $this->responseWithError(__('OTP did not match. Please provide correct OTP'), [], 401);
            endif;

            try {
                if (!$token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user)) {
                    return $this->responseWithError(__('Invalid credentials'), [], 401);
                }
            } catch (JWTException $e) {
                return $this->responseWithError(__('Unable to login, please try again'), [], 422);

            } catch (ThrottlingException $e) {
                return $this->responseWithError(__('Suspicious activity on your ip, try after').' '. $e->getDelay() .' '.  __('seconds'), [], 422);

            } catch (\Exception $e) {
                return $this->responseWithError($e->getMessage(), [], 500);
            }

            $data['token']          = $token;
            $data['first_name']     = $user->first_name;
            $data['last_name']      = $user->last_name;
            $data['image']          = $user->profile_image;
            $data['phone']          = nullCheck($user->phone);
            $data['email']          = nullCheck($user->email);
            $data['socials']        = $user->socials;

            return $this->responseWithSuccess(__('Login Successfully'),$data,200);

        } catch (\Exception $e){
            return $this->responseWithError($e->getMessage(),[],500);
        }
    }
    public function config(AddonInterface $addon,PageRepository $pageRepository,Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $languages  = Language::where('status',1)->selectRaw('id,name,locale as code,text_direction,flag')->get();
            $currencies = Currency::where('status',1)->selectRaw('id,name,symbol,code,exchange_rate')->get();

            $currency_lists = [];
            $id = 0;

            foreach ($currencies as $currency) {
                $id                 = $currency->id;
                $currency_lists[]   = [
                    'id'            => (int)$currency->id,
                    'name'          => $currency->name,
                    'symbol'        => $currency->symbol,
                    'code'          => $currency->code,
                    'exchange_rate' => $currency->exchange_rate,
                ];
            }

            if (count($currencies) > 0)
            {
                $usd = $currencies->where('code','USD')->first();
                if (!$usd)
                {
                    $currency_lists[]   = [
                        'id'            => $id+1,
                        'name'          => 'US Dollar',
                        'symbol'        => '$',
                        'code'          => 'USD',
                        'exchange_rate' => 1,
                    ];
                }
            }
            else{
                $currency_lists[]   = [
                    'id'            => $id+1,
                    'name'          => 'US Dollar',
                    'symbol'        => '$',
                    'code'          => 'USD',
                    'exchange_rate' => 1,
                ];
            }
            $country = Country::find(settingHelper('default_country'));

            $data = [
                'app_config'                => [
                    'login_mandatory'       => settingHelper('mandatory_login') == 1,
                    'intro_skippable'       => settingHelper('intro_skippable') == 1,
                    'privacy_policy_url'    => nullCheck(settingHelper('privacy_policy_url')),
                    'terms_condition_url'   => nullCheck(settingHelper('terms_condition_url')),
                    'support_url'           => nullCheck(settingHelper('support_url')),
                    'seller_system'         => settingHelper('seller_system') == 1,
                    'color_system'          => settingHelper('color') == 1,
                    'pickup_point_system'   => settingHelper('pickup_point') == 1,
                    'wallet_system'         => settingHelper('wallet_system') == 1,
                    'coupon_system'         => settingHelper('wallet_system') == 1,
                    'disable_otp'           => (bool)settingHelper('disable_otp_verification'),
                    'disable_guest'         => (bool)settingHelper('disable_guest_checkout'),
                    'disable_email'         => (bool)settingHelper('disable_email_confirmation'),
                    'default_country'       => $country ? $country->iso2 : 'BD',
                ],
                'android_version'               => [
                    'apk_version' => settingHelper('latest_apk_version'),
                    'apk_code' => settingHelper('latest_apk_code'),
                    'apk_file_url' => settingHelper('apk_file_url'),
                    'whats_new' => settingHelper('whats_new_latest_apk'),
                    'update_skippable' => (bool)settingHelper('android_skippable'),
                ],
                'ios_version'                   => [
                    'ipa_version' => settingHelper('latest_ipa_version'),
                    'ipa_code' => settingHelper('latest_ipa_code'),
                    'ipa_file_url' => settingHelper('ipa_file_url'),
                    'whats_new' => settingHelper('whats_new_latest_ipa'),
                    'update_skippable' => (bool)settingHelper('ios_skippable'),
                ],
                'languages'                     => count($languages) > 0 ? $languages->makeHidden(['flag']) : [],
                'currencies'                    => $currency_lists,
                'pages'                         => PageResource::collection($pageRepository->allPages()),
                'addons'                        => AddOnResource::collection($addon->all()->get()),
                'currency_config'               => [
                    'currency_symbol_format'    => (string)settingHelper('currency_symbol_format'),
                    'decimal_separator'         => (string)settingHelper('decimal_separator'),
                    'no_of_decimals'            => (string)settingHelper('no_of_decimals'),
                ]
            ];
            return $this->responseWithSuccess(__('Config Retrieved'), $data, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

}
