<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserService
{
    /**
     * Find all users
     */
    public function findAll(): Collection;

    /**
     * Find by ID
     *
     * @param string id
     *
     * @return \App\Models\User
     */
    public function findById(string $id);

    /**
     * Update user info
     *
     * @param array $data user info
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function update(array $data, User $user);

}
