<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use App\Models\User;
use App\Permission\Permission;
use App\Permission\PermissionCapabilities;

class UserController extends Controller
{

    public function __construct(
        private UserService $userService,
        private Permission $permission
    ) {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_USERS_LABEL
        );

        return $this->userService->findAll();
    }

    public function roles()
    {
        return $this->userService->getRoles();
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $user)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_USER_DETAIL_LABEL
        );

        return $this->userService->findById($user);
    }

    public function store(UserRequest $request)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::CREATE_USERS_LABEL
        );

        return $this->userService->create($request->validated());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function update(UserRequest $request, User $user)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::UPDATE_USER_PROFILE_LABEL
        );

        return $this->userService->update($request->validated(), $user);
    }
}
