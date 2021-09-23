<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Str;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(User::ROLES as $role) {
            Role::create([
                'id' => Str::orderedUuid(),
                'name' => $role,
                'guard_name' => 'api'
            ]);
        }
    }
}
