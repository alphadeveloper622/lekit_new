<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstallRequest;
use App\Models\Setting;
use App\Models\User;
use App\Traits\UpdateTrait;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use ZipArchive;

class InstallController extends Controller
{
    use UpdateTrait;
    public function index()
    {
        try {
            return view('install.index');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function getInstall(InstallRequest $request): \Illuminate\Http\JsonResponse
    {
        ini_set('max_execution_time', 900); //900 seconds
        $host           = $request->host;
        $db_user        = $request->db_user;
        $db_name        = $request->db_name;
        $db_password    = $request->db_password;

        $first_name     = $request->first_name;
        $last_name      = $request->last_name;
        $email          = $request->email;
        $login_password = $request->password;

        $purchase_code  = $request->purchase_code;

        //check for valid database connection
        try{
            $mysqli = @new \mysqli($host, $db_user, $db_password, $db_name);
        }catch (\Exception $e){
            return response()->json([
                'error'   => __('Please input valid database information.'),
            ]);
        }
        if (mysqli_connect_errno()) {
            return response()->json([
                'error'   => __('Please input valid database information.'),
            ]);
        }
        $mysqli->close();

        // validate code

        $data['DB_HOST']        = $host;
        $data['DB_DATABASE']    = $db_name;
        $data['DB_USERNAME']    = $db_user;
        $data['DB_PASSWORD']    = $db_password;
        $verification = validate_purchase($purchase_code, $data);
        if ($verification === 'success') :
            session()->put('email', $email);
            session()->put('first_name', $first_name);
            session()->put('last_name', $last_name);
            session()->put('login_password', $login_password);
            session()->put('purchase_code', $purchase_code);

            return response()->json([
                'route'     => route('install.finalize'),
                'success'   => true,
            ]);
        elseif ($verification === 'connection_error'):
            return response()->json([
                'error'   => __('There is a problem to connect with SpaGreen server.Make sure you have active internet connection!'),
            ]);

        elseif ($verification === false):
            return response()->json([
                'error'   => __('Something went wrong. Please try again.'),
            ]);

        else:
            return response()->json([
                'error'   => $verification,
            ]);
        endif;
    }

    public function final()
    {
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            foreach (DB::select('SHOW TABLES') as $table) {
                $table_array = get_object_vars($table);
                Schema::drop($table_array[key($table_array)]);
            }
            DB::unprepared(file_get_contents(base_path('public/sql/sql.sql')));
            if (file_exists(base_path('public/sql/sql.sql'))):
                unlink(base_path('public/sql/sql.sql'));
            endif;
            $zip_file = base_path('public/install/installer.zip');
            if (file_exists($zip_file)) {
                $zip = new ZipArchive;
                if ($zip->open($zip_file) === TRUE) {
                    $zip->extractTo(base_path('public/install/installer/'));
                    $zip->close();
                } else {
                    return response()->json([
                        'error' => "Installation files Not Found, Please Try Again",
                        'route' => route('install.initialize'),
                    ]);
                }
                unlink($zip_file);
            }

            $update_file_path = base_path('public/install/installer');

            if(is_dir($update_file_path))
            {
                $config_file = $update_file_path.'/config.json';
                if(file_exists($config_file)) {
                    $config = json_decode(file_get_contents($config_file), true);
                    $this->recurse_copy($update_file_path, base_path('/'));
                }
                else{
                    return response()->json([
                        'error' => "Config File Not Found, Please Try Again",
                        'route' => route('install.initialize'),
                    ]);
                }
            }
            else{
                return response()->json([
                    'error' => "Installation files Not Found, Please Try Again",
                    'route' => route('install.initialize'),
                ]);
            }

            $this->dataInserts($config);
            $this->envUpdates();
            File::deleteDirectory($update_file_path);
            sleep(3);
            Artisan::call('all:clear');
            return response()->json([
                'success' => "Installation was Successful",
                'route' => url('/'),
            ]);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    protected function dataInserts($config)
    {
        $user                = User::find(1);
        $user->email         = Session::get('email');
        $user->first_name    = Session::get('first_name');
        $user->last_name     = Session::get('last_name');
        $user->password      = bcrypt(Session::get('login_password'));
        $user->save();

        $code = Setting::where('title','purchase_code')->first();

        if ($code)
        {
            $code->update([
                'value' => session()->get('purchase_code'),
            ]);
        }
        else{
            Setting::create([
                'title' => 'purchase_code',
                'value' => session()->get('purchase_code'),
            ]);
        }

        if (isAppMode())
        {
            $version = $config['app_version'];
            $version_code = $config['app_version_code'];
        }
        else{
            $version = $config['web_version'];
            $version_code = $config['web_version_code'];
        }

        $code       = Setting::where('title','version_code')->first();
        $version_no = Setting::where('title','current_version')->first();

        if ($code)
        {
            $code->update([
                'value' => $version_code,
            ]);
        }
        else{
            Setting::create([
                'title' => "version_code",
                'value' => $version_code
            ]);
        }

        if ($version_no)
        {
            $version_no->update([
                'value' => $version,
            ]);
        }
        else{
            Setting::create([
                'title' => "current_version",
                'value' => $version
            ]);
        }

        if (arrayCheck('removed_directories',$config))
        {
            foreach ($config['removed_directories'] as $directory)
            {
                File::deleteDirectory(base_path($directory));
            }
        }

        app_config();
        pwa_config();
    }

    protected function envUpdates()
    {
        envWrite('APP_URL', URL::to('/'));
        envWrite('MIX_ASSET_URL', URL::to('/').'/public');
        envWrite('APP_INSTALLED', 'yes');
        Artisan::call('key:generate');
        Artisan::call('migrate', ['--force' => true]);
    }
}