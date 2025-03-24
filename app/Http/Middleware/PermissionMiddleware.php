<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PermissionMiddleware
{
    const UN_AUTHORIZED = 'unauthorized.index';

    public function __construct(
        //Dependency Injection Here
    ) {

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //For Logout For No Restrictions
        if ($request->route()->uri == "logout") {
            return $next($request);
        }

        if ($request->route()->uri == "/") {
            return $next($request);
        }

        $sessionPermission = Session::get('permission_key'); //"manage users,create users,manage countries,create countries"
        $arrPermission = explode(",", $sessionPermission); //['manage users','create users','manage countries','create countries']
        $getRouteName = request()->route()->getName(); // Eg."users.index"
        $arrRouteName = explode('.', $getRouteName); // ['users','index']
        $getRouteMethod = end($arrRouteName); // index
        $getRouteModel = $arrRouteName[0]; //users
        $permissionName = null;
        switch ($getRouteMethod) {
            case "index":
                $permissionName = 'manage ' . $getRouteModel;
                break;
            case "show":
                $permissionName = 'show ' . $getRouteModel;
                break;
            case "create":
            case "store":
                $permissionName = 'create ' . $getRouteModel;
                break;
            case "edit":
            case "update":
                $permissionName = 'edit ' . $getRouteModel;
                break;
            case "destroy":
                $permissionName = 'delete ' . $getRouteModel;
                break;
        }
        if (!in_array($permissionName, $arrPermission)) {
            abort(403);
        }

        return $next($request);
    }
}
