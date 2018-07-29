<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Permission {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {



        if ($request->is('admin/permission') || $request->is('admin/permission/create') || $request->is('admin/permission/*/edit') ) {
            if (!auth('admin')->user()->hasPermissionTo('RoleCRUD')) {
                abort('403');
            } else {
                return $next($request);
            }
        }


        return $next($request);
    }
}