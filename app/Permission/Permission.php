<?php

namespace App\Permission;

use App\Utils\Token;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class Permission
{
    protected array $capabilities;

    public function __construct()
    {
        $this->capabilities = config('permission.capabilities');
    }

    public function throwIfAccessDenied(string $capability)
    {
        if ($this->fromMobile()) {
            return true;
        }

        $roles =  Auth::user()->roles
            ->map(fn ($role) => $role->name)
            ->toArray();

        foreach ($roles as $role) {
            if ($this->capabilities[$capability][$role]) {
                return true;
            }
        }

        throw new AccessDeniedHttpException('Access is denied.');
    }

    private function fromMobile(): bool
    {
        if (Auth::user()->currentAccessToken()->name === Token::MOBILE) {
            return true;
        }

        return false;
    }
}
