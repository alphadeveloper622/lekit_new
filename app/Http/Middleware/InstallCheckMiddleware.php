<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class InstallCheckMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            return redirect('install/initialize')->with('error', 'Could not find MySQL driver or Connection is Not Established');
        }

        if (Schema::hasTable('settings') && Schema::hasTable('users') && isInstalled()) {
            return $next($request);
        }

        return redirect('install/initialize');
    }
}