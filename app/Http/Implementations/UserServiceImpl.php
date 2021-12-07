<?php

namespace App\Http\Implementations;

use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements UserService
{
    public function findAll()
    {
        $users = collect([]);

        User::latest()->with('roles')->get()
            ->filter(fn ($user) => !$user->hasAnyRole(User::ADMIN))
            ->each(fn ($user) => $users->push($user));

        return $users;
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

        if (isset($data['roles'])) {
            $user->syncRoles($data['roles']);
        }

        return $user->update($data);
    }

    public function getRoles(): array
    {
        return [User::MANAGER, User::COLLECTOR];
    }

    public function create(array $data): User
    {
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        $user->syncRoles($data['roles']);

        return $user;
    }

    public function collectors()
    {
        return User::role(User::COLLECTOR)->get();
    }

    public function hasAccess(User $user, array $roles): bool
    {
        return $user->hasAnyRole($roles);
    }

    public function resetPassword(User $user)
    {
        return $user->update([
            'password' => Hash::make(User::DEFAULT_PASSWORD)
        ]);
    }

    public function disabled(User $user, bool $status)
    {
        return $user->update([
            'disabled' => $status
        ]);
    }
}
