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

    /**
     * Get user roles
     *
     * @return array
     */
    public function getRoles(): array;

    /**
     * Create new User
     *
     * @param array $data UserRequest validated data
     *
     * @return \App\Models\User
     */
    public function create(array $data): User;

    /**
     * Check if user has access with the given role.
     *
     * @param \App\Models\User $user
     * @param array $roles roles to compare
     *
     * @return bool if user has access
     */
    public function hasAccess(User $user, array $roles): bool;
}
