<?php

namespace BasicDashboard\Web\Auth\Services;

use App\Observers\AuthObserver;
use BasicDashboard\Foundations\Domain\Users\User;
use BasicDashboard\Web\Common\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthService extends BaseController
{
    const LOGIN = "Login Event";
    const LOGOUT = "Logout Event";

    public function __construct
    (
        private AuthObserver $authObserver,
    ) {

    }

    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        if (Auth::user() == null) {
            return view('auth.login');
        } else {
            $permissionArr = User::find(Auth::id())->getAllPermissions()->pluck('name')->toArray(); // get auth user and give permission to Session
            Session::put('permission_key', implode(',', $permissionArr));
            $this->authObserver->AuthDetection(self::LOGIN);
            return redirect("/");
        }
    }

    public function authorizeOperator($request)
    {
        if (Auth::attempt($request)) {
            return redirect("/login");
        }
        return redirect()->back()->with("message", '');
    }

    public function logout()
    {
        $this->authObserver->AuthDetection(self::LOGOUT);
        Auth::logout();
        return redirect('/login');
    }
}
