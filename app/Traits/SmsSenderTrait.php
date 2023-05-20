<?php

namespace App\Traits;

use Twilio\Rest\Client;
use Vonage\SMS\Message\SMS;

trait SmsSenderTrait
{
    public function test($request){
        $phone_number   = '+' .$request['ccode'] . $request['test_number'];
        $provider       = $request->type;
        $sms_body       = 'This is a text message from '.$provider.' for checking configuration';
        if ($this->send($phone_number, $sms_body, $request->template_id, $provider, true)):
            return true;
        else:
            return false;
        endif;
    }
    public function send($phone_number, $sms_body, $template_id = '', $provider = '', $masking = false)
    {
        $provider = $provider != '' ? $provider : settingHelper('active_sms_provider');

        if ($provider == 'twilio'):
            $sid        = settingHelper("twilio_sms_sid");
            $token      = settingHelper("twilio_sms_auth_token");
            $client     = new Client($sid, $token);

            try {
                $message = $client->messages->create(
                    $phone_number,
                    array(
                        'from' => settingHelper('valid_twilio_sms_number'),
                        'body' => $sms_body
                    )
                );
                return true;
            } catch (\Exception $e) {
                return false;
            }

        elseif ($provider == 'nexmo'):

            try {
                $basic = new \Vonage\Client\Credentials\Basic(settingHelper('nexmo_sms_key'), settingHelper('nexmo_sms_secret_key'));
                $client = new \Vonage\Client($basic);
                $response = $client->sms()->send(
                    new SMS($phone_number, BRAND_NAME, $sms_body)
                );
                $message = $response->current();

                if ($message->getStatus() == 0) :
                    return true;
                else:
                    return false;
                endif;
            } catch (\Exception $e) {
                return false;
            }
        elseif ($provider == 'spagreen'):
            $phone_number = preg_replace('/^(\+88|88)/', '', $phone_number);
            $phone_number = preg_replace('/-/', '', $phone_number);
            $phone_number = preg_replace('/(\s)/', '', $phone_number);

            $url = 'https://smpp.ajuratech.com:7790/sendtext';
            $params = array(
                "apikey" => settingHelper('spagreen_sms_api_key'),
                "secretkey" => settingHelper('spagreen_secret_key'),
                "callerID" => "SENDER_ID",
                "toUser" => $phone_number,
                "messageContent" => $sms_body
            );

            $ch = \curl_init();

            $data = http_build_query($params);
            $getUrl = $url . "?" . $data;
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_URL, $getUrl);
            curl_setopt($ch, CURLOPT_TIMEOUT, 80);

            $result = \curl_exec($ch);

            \curl_close($ch);

            if ($success    = strstr($result, 'ACCEPTD') !== false) :
                return true;
            else:
                return false;
            endif;

        elseif ($provider == 'mimo'):
            $token = $this->getToken();
            $this->sendMessage($phone_number, $sms_body, $token);
            $this->logout($token);

        elseif ($provider == 'ssl' || $provider == 'ssl_wireless'):
            $token = settingHelper("ssl_sms_api_token");
            $sid = settingHelper("ssl_sms_sid");

            $data = [
                "api_token" => $token,
                "sid"       => $sid,
                "msisdn"    => $phone_number,
                "sms"       => $sms_body,
                "csms_id"   => date('dmYhhmi') . rand(10000, 99999)
            ];

            $url = settingHelper("ssm_sms_url");
            $data = json_encode($data);

            $ch = \curl_init();
            \curl_setopt($ch, CURLOPT_URL, $url);
            \curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            \curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            \curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            \curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            \curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            \curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data),
                'accept:application/json'
            ));

            $response = \curl_exec($ch);


            \curl_close($ch);

            return true;

        elseif ($provider == 'fast2'):
            if (strpos($phone_number, '+91') !== false) {
                $phone_number = substr($phone_number, 3);
            }

            if (settingHelper("fast_2_route") == 'dlt_manual') {
                $fields = array(
                    "sender_id" => settingHelper("fast_2_sender_id"),
                    "message" => $sms_body,
                    "template_id" => $template_id,
                    "entity_id" => settingHelper("fast_2_entity_id"),
                    "language" => settingHelper("fast_2_language"),
                    "route" => settingHelper("fast_2_route"),
                    "numbers" => $phone_number,
                );
            } else {
                $fields = array(
                    "sender_id" => settingHelper("fast_2_sender_id"),
                    "message" => $sms_body,
                    "language" => settingHelper("fast_2_language"),
                    "route" => settingHelper("fast_2_route"),
                    "numbers" => $phone_number,
                );
            }


            $auth_key = settingHelper('fast_2_auth_key');

            $curl = \curl_init();

            \curl_setopt_array($curl, array(
                CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($fields),
                CURLOPT_HTTPHEADER => array(
                    "authorization: $auth_key",
                    "accept: */*",
                    "cache-control: no-cache",
                    "content-type: application/json"
                ),
            ));

            $response = \curl_exec($curl);
            $err = \curl_error($curl);

            \curl_close($curl);

            return true;
        endif;
    }

    public function getToken()
    {
        $curl = \curl_init();

        \curl_setopt_array($curl, array(
            CURLOPT_URL => '52.30.114.86:8080/mimosms/v1/user/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "username": "' . settingHelper('mimo_username') . '",
                "password": "' . settingHelper('mimo_sms_password') . '"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = \curl_exec($curl);

        \curl_close($curl);
        return json_decode($response)->token;

    }

    public function sendMessage($phone_number, $sms_body, $token)
    {
        $curl = \curl_init();

        $fields = array(
            "sender"        => settingHelper("mimo_sms_sender_id"),
            "text"          => $sms_body,
            "recipients"    => $phone_number
        );
        // dd($to);
        \curl_setopt_array($curl, array(
            CURLOPT_URL => '52.30.114.86:8080/mimosms/v1/message/send?token=' . $token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = \curl_exec($curl);

        \curl_close($curl);

        return true;
    }

    public function logout($token)
    {
        $curl = \curl_init();

        \curl_setopt_array($curl, array(
            CURLOPT_URL => '52.30.114.86:8080/mimosms/v1/user/logout?token=' . $token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = \curl_exec($curl);

        \curl_close($curl);

        return true;
    }

}
