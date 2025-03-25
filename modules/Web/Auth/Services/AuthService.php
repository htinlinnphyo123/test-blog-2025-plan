<?php

namespace BasicDashboard\Web\Auth\Services;

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
        Auth::logout();
        return redirect('/login');
    }
}
