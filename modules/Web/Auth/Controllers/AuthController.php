<?php

namespace BasicDashboard\Web\Auth\Controllers;

use BasicDashboard\Web\Common\BaseController;
use BasicDashboard\Foundations\Domain\Users\User;
use BasicDashboard\Web\Auth\Services\AuthService;
use BasicDashboard\Web\Auth\Validation\AuthLoginRequest;

class AuthController extends BaseController
{
    public function __construct(private AuthService $authService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return $this->authService->login();
    }

    public function authorizeOperator(AuthLoginRequest $request)
    {
        return $this->authService->authorizeOperator($request->validated());
    }

    public function logout()
    {
        return $this->authService->logout();
    }
}