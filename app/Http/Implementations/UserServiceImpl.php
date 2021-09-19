<?php

namespace App\Http\Implementations;

use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserServiceImpl implements UserService {
    public function findAll(): Collection
    {
        return User::all();
    }

    public function findById(string $id)
    {
        return User::findOrFail($id);
    }

    public function update(array $data, User $user)
    {
        return $user->update($data);
    }
}
