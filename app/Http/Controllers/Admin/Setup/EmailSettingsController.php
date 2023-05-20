<?php

namespace App\Http\Controllers\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setup\EmailSettingRequest;
use App\Repositories\Interfaces\Admin\SettingInterface;
use App\Traits\SendMailTrait;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class EmailSettingsController extends Controller
{

    private $settings;
    use SendMailTrait;
    public function __construct(SettingInterface $settings)
    {
        $this->settings     = $settings;
    }

    public function index(){
        return view('admin.system-setup.email-settings');
    }
    public function update(EmailSettingRequest $request){
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
            $driver = $request->mail_driver;
        if ($this->settings->update($request)):
            if($driver == 'smtp' || $driver == 'sendgrid' || $driver == 'mailgun' || $driver == 'sendinBlue' || $driver == 'zohoSMTP'):
                $mail_host                 = settingHelper('smtp_mail_host');
                $mail_port                 = settingHelper('smtp_mail_port');
                $mail_address              = settingHelper('smtp_mail_address');
                $name                      = settingHelper('smtp_name');
                $mail_username             = settingHelper('smtp_mail_username');
                $mail_password             = settingHelper('smtp_mail_password');
                $mail_encryption_type      = settingHelper('smtp_mail_encryption_type');
            elseif($request->mail_driver == 'sendmail'):
                $sendmail_path                  = settingHelper('sendmail_path');
            endif;

            if($request->mail_driver == 'sendmail'){
                envWrite('MAIL_MAILER','sendmail');
                envWrite('MAIL_HOST',"");
                envWrite('MAIL_PORT',"");
                envWrite('MAIL_USERNAME',"");
                envWrite('MAIL_PASSWORD',"");
                envWrite('MAIL_ENCRYPTION',"");
                envWrite('MAIL_FROM_ADDRESS',"");
                envWrite('MAIL_FROM_NAME',"");
                envWrite('SENDMAIL_PATH',$sendmail_path);
            }else{
                envWrite('MAIL_MAILER','smtp');
                envWrite('MAIL_HOST',$mail_host);
                envWrite('MAIL_PORT',$mail_port);
                envWrite('MAIL_USERNAME',$mail_username);
                envWrite('MAIL_PASSWORD',$mail_password);
                envWrite('MAIL_ENCRYPTION',$mail_encryption_type);
                envWrite('MAIL_FROM_ADDRESS',$mail_address);
                envWrite('MAIL_FROM_NAME',$name);
            }
            Toastr::success(__('Setting Updated Successfully'));
            return redirect()->back();
        else:
            Toastr::error(__('Something went wrong, please try again.'));
            return redirect()->back();
        endif;
    }
    public function sendTestMail(Request $request)
    {
        try {
            $data['message']     = __('Email is working Perfectly!! This is test email from ').settingHelper('system_name',\App::getLocale());
            $data['subject']     = __('Test Email');
//            $this->sendMailTo($request->send_to, $data);
            $this->sendmail($request->send_to, 'Test Mail', $data, 'email.auth.email-template','');

//            $this->sendMailTo($request->send_to, 'Test Email', $data, 'email.auth.email-template','');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
}
