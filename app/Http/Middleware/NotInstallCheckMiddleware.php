<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class NotInstallCheckMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            return response()->view('install.index');
        }

        if (Schema::hasTable('settings') && Schema::hasTable('users') && isInstalled()) {
            return redirect('/');
        }
        return $next($request);
    }
}