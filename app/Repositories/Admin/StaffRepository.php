<?php

namespace App\Repositories\Admin;

use App\Models\LogActivity;
use App\Models\User;
use App\Repositories\Interfaces\Admin\Addon\WalletInterface;
use App\Repositories\Interfaces\Admin\StaffInterface;
use App\Traits\ImageTrait;
use Brian2694\Toastr\Facades\Toastr;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Sentinel;

class StaffRepository implements StaffInterface
{
    use ImageTrait;

    protected $wallet;
    public function __construct(WalletInterface $wallet)
    {
        $this->wallet          = $wallet;
    }

    public function get($id)
    {
        return User::find($id);
    }

    public function all()
    {
        return User::with('role')->whereNotIn('id', [1, Sentinel::getUser()->id])->where('user_type', 'staff')->latest();
    }

    public function paginate($request, $limit)
    {

        return User::with('role')->where('user_type','staff')->whereNotIn('id', [1, Sentinel::getUser()->id])
            ->when($request->q != null, function ($query) use ($request){
                $query->where(function ($q) use ($request){
                    $q->where('email', 'LIKE', '%'.$request->q.'%');
                    $q->orWhere('phone', 'LIKE', '%'.$request->q.'%');
                    $q->orWhere(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE', "%".$request->q."%");
                });
;
            })->latest()->paginate($limit);

    }

    public function store($request)
    {
        if (!blank($request->file('image'))) {
            $requestImage = $request->file('image');
            $image_response = $this->saveImage($requestImage, '_staff_');
        }

        $user               = new User();
        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->phone        = $request->phone;
        $user->email        = $request->email;
        $user->user_type    = "staff";
        $user->password     = bcrypt($request->password);
        $user->images       = $image_response['images'] ?? [];
        $user->permissions  = isset($request->permissions) ? $request->permissions : [];
        $user->role_id      = isset($request->role) ? $request->role : null;
        $user->pickup_hub_id = isset($request->pickup_hub) ? $request->pickup_hub : null;
        $user->country_id   = $request->country_id ? : settingHelper('default_country');

        $user->save();

        $activation = Activation::create($user);
        Activation::complete($user, $activation->code);

        return true;
    }

    public function update($request)
    {
        $user = $this->get($request->id);

        if (!blank($request->file('image'))) {
            $requestImage = $request->file('image');

            $this->deleteImage($user->images);
            $image_response = $this->saveImage($requestImage, '_staff_');
            $user->images = $image_response['images'];
        }

        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->phone        = $request->phone;
        $user->email        = $request->email;
        $user->country_id   = $request->country_id ? : settingHelper('default_country');

        if(isset($request->role)):
            $user->role_id      = $request->role != null ? $request->role : null;
        endif;
        if(isset($request->pickup_hub)):
            $user->pickup_hub_id = $request->pickup_hub;
        endif;
        if ($request->password != ""):
            $user->password = bcrypt($request->password);
        endif;
        if($user->id != 1 && $request->permissions):
            $user->permissions = $request->permissions;
        endif;

        $user->save();
        return true;
    }

    public function logActivity($limit)
    {
        return LogActivity::where('user_id', authUser()->id)->latest()->paginate($limit);
    }

    public function updatePassword($request)
    {
        $user = User::find(authId());

        $user->password = Hash::make($request->new_password);
        $user->last_password_change = \Carbon\Carbon::now();
        $user->save();
        return true;
    }

    public function logoutOtherDevices()
    {
        $user = authUser();

        if(Sentinel::logout(null, true)):
            Sentinel::authenticate($user);

            return true;
        else:
            return false;
        endif;
    }

    public function collectFormStaff($request)
    {
        $staff           = $this->get($request->user_id);
        $staff->balance  = $staff->balance - $request->amount;
        $staff->save();

        $staffHistory['user_id']     = $request->user_id;
        $staffHistory['amount']      = $request->amount;
        $staffHistory['source']      = 'deposit_from_staff';
        $staffHistory['type']        = 'expense';
        $staffHistory['status']      = 'approved';

        $this->wallet->store($staffHistory);

        $admin           = $this->get(authId());
        $admin->balance  = $admin->balance + $request->amount;
        $admin->save();

        $adminHistory['user_id']     = authId();
        $adminHistory['amount']      = $request->amount;
        $adminHistory['source']      = 'deposit_from_staff';
        $adminHistory['type']        = 'income';
        $adminHistory['status']      = 'approved';

        $this->wallet->store($adminHistory);
        return true;
    }
}
