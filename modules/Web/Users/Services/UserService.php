<?php

namespace BasicDashboard\Web\Users\Services;

use Exception;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use BasicDashboard\Web\Common\BaseController;
use BasicDashboard\Foundations\Domain\Users\User;
use BasicDashboard\Web\Users\Resources\UserResource;
use BasicDashboard\Web\Users\Resources\UserEditResource;
use BasicDashboard\Foundations\Domain\Roles\Repositories\RoleRepositoryInterface;
use BasicDashboard\Foundations\Domain\Users\Repositories\UserRepositoryInterface;

class UserService extends BaseController
{
    const VIEW = 'admin.user';
    const ROUTE = 'users';
    const LANG_PATH = "user.user";
    const ROOT = "Users";

    public function __construct(
        private UserRepositoryInterface $userRepository,
        private RoleRepositoryInterface $roleRepository,
    ) {}

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index(array $request): View
    {
        $userList = $this->userRepository->getUserList($request);
        $userList = UserResource::collection($userList)->response()->getData(true);
        // dd($userList);
        return $this->returnView(self::VIEW . '.index', $userList, $request);
    }

    public function create(): View
    {
        return view(self::VIEW . '.create');
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function store(array $request): RedirectResponse
    {
        try {
            $image = null;
            $this->userRepository->beginTransaction();
            if (isset($request['profile_photo'])) {
                $image = $request['profile_photo']; //store image to another variable
                $request['profile_photo'] = null; //remove value of profile photo
            }
            $roleName = $this->getRoleName($request['role_id']);
            $request = Arr::except($request, ['role_id']); //remove array key and value role_id bcz there is no role_id column in users table
            $user = $this->userRepository->insert($request); //insert user by repo base method
            $user->assignRole($roleName); //user role assign
            $data = $this->uploadImageToCloud($user, $image); //upload image to digital ocean path(User/id/demo.jpg)
            $user->update($data); //update previous user of profile photo by laravel method
            $this->userRepository->commit();
            return $this->redirectRoute(self::ROUTE . ".index", __(self::LANG_PATH . '_created'));
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->userRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function edit(string $id): View | RedirectResponse
    {
        $user = $this->userRepository->edit($id);
        $user = new UserEditResource($user);
        $user = $user->response()->getData(true)['data'];
        return $this->returnView(self::VIEW . ".edit", $user);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function show($id): View | RedirectResponse
    {
        $user = $this->userRepository->show($id);
        $user = new UserResource($user);
        $user = $user->response()->getData(true)['data'];
        return $this->returnView(self::VIEW . '.show', $user);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function update(array $request, string $id): RedirectResponse
    {
        $image = null;
        try {
            // dd($request['role_id']);
            $this->userRepository->beginTransaction();
            $user = $this->userRepository->edit($id);
            $oldImage = $user->profile_photo;
            if (isset($request['profile_photo'])) {
                $image = $request['profile_photo']; //store image to another variable
                $request['profile_photo'] = null; //remove value of profile photo
            }
            $roleName = $this->getRoleName($request['role_id']);
            $request = Arr::except($request, ['role_id']);
            $this->userRepository->update($request, $id);
            $user->syncRoles($roleName);
            $data = $this->uploadImageToCloudForUpdate($user, $image, $oldImage); //upload image to digital ocean path(User/id/demo.jpg)
            $user->update($data);
            $this->userRepository->commit();
            return $this->redirectRoute(self::ROUTE . ".index", __(self::LANG_PATH . '_updated'));
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->userRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function destroy($request): RedirectResponse
    {
        try {
            $this->userRepository->beginTransaction();
            $user = $this->userRepository->edit($request['id']);
            $this->userRepository->delete($request['id']);
            $user->removeRole($request['role_name']);
            if ($user->profile_photo != null) {
                $this->deleteImageFromCloud($user->profile_photo);
            }
            $this->userRepository->commit();
            return $this->redirectRoute(self::ROUTE . ".index", __(self::LANG_PATH . '_deleted'));
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->userRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    private function getRoleName(string $roleId)
    {
        return $this->roleRepository->connection(true)->where('id', $roleId)->value('name');
    }

    private function uploadImageToCloud(User $user, object | null $image): array
    {
        $profilePhoto = $image ? $this->uploadImage($image, self::ROOT . "/" . $user->id) : null; //return image url string
        $data = [
            "profile_photo" => $profilePhoto,
        ]; //prepare data for profile photo update for previous user
        return $data;
    }

    private function uploadImageToCloudForUpdate(User $user, object | null $image, string | null $oldImage): array
    {
        $profilePhoto = null;
        if ($image) {
            $oldImage == null ? '' : $this->deleteImage($oldImage);
            $profilePhoto = $this->uploadImage($image, self::ROOT . "/" . $user->id);
        }
        $data = [
            "profile_photo" => $profilePhoto == null ? $oldImage : $profilePhoto,
        ]; //prepare data for profile photo update for previous user
        return $data;
    }

    private function deleteImageFromCloud(string $oldImage): void
    {
        $this->deleteImage($oldImage);
    }
    ///////////////////////////This is Method Divider///////////////////////////////////////
    public function profile()
    {
        $id = customEncoder(Auth::id());
        $user = $this->userRepository->show($id);
        $user = new UserResource($user);
        $user = $user->response()->getData(true)['data'];      
        
        return $this->returnView(self::VIEW . '.profile',$user);
    }
}
