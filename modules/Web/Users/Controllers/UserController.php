<?php

namespace BasicDashboard\Web\Users\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use BasicDashboard\Web\Common\BaseController;
use BasicDashboard\Web\Users\Services\UserService;
use BasicDashboard\Web\Users\Validation\StoreUserRequest;
use BasicDashboard\Web\Users\Validation\DeleteUserRequest;
use BasicDashboard\Web\Users\Validation\UpdateUserRequest;

class UserController extends BaseController
{
    public function __construct(
        private UserService $userService
    ) {}

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index(Request $request): View
    {
        return $this->userService->index($request->all());
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function create(): View
    {
        return $this->userService->create();
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function store(StoreUserRequest $request): RedirectResponse
    {
        return $this->userService->store($request->all());
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function edit(string $id): View | RedirectResponse
    {
        return $this->userService->edit($id);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function show($id): View | RedirectResponse
    {
        return $this->userService->show($id);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function update(UpdateUserRequest $request, string $id): RedirectResponse
    {

        return $this->userService->update($request->all(), $id);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function destroy(DeleteUserRequest $request): RedirectResponse
    {
        return $this->userService->destroy($request->validated());
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function profile()
    {
        return $this->userService->profile();
    }
}

// public function show(Request $request,$id)
// {
//     return $this->userService->show($request,$id);
// }
