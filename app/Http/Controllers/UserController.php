<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->userService->findAll();
    }

    public function roles()
    {
        return $this->userService->getRoles();
    }

    public function hasAccess(Request $request, User $user) {
        return $this->userService->hasAccess($user, $request->roles);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $user)
    {
        return $this->userService->findById($user);
    }

    public function store(UserRequest $request)
    {
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
        return $this->userService->update($request->validated(), $user);
    }
}
