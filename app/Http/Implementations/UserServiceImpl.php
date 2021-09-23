<?php

namespace App\Http\Implementations;

use App\Http\Services\UserService;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements UserService
{
    public function findAll(): Collection
    {
        return User::with('roles')->get();
    }

    public function findById(string $id)
    {
        return User::with('roles')->findOrFail($id);
    }

    public function update(array $data, User $user)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->syncRoles($data['roles']);

        return $user->update($data);
    }

    public function getRoles(): array
    {
        return User::ROLES;
    }

    public function create(array $data): User
    {
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        $user->syncRoles($data['roles']);

        return $user;
    }
}
