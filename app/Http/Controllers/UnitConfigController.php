<?php

namespace App\Http\Controllers;

use App\Http\Services\UnitConfigService;
use App\Models\Unit;
use App\Permission\Permission;
use App\Permission\PermissionCapabilities;
use App\Utils\Token;

class UnitConfigController extends Controller
{


    public function __construct(
        private UnitConfigService $unitConfigService,
        private Permission $permission
    ) {
    }

    public function getConfig(Unit $unit)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_UNIT_CONFIG_LABEL
        );

        return $this->unitConfigService->getConfig($unit);
    }

    public function store(Unit $unit)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::CREATE_UNIT_CONFIG_LABEL
        );

        return $this->unitConfigService->createConfig(
            $unit->createToken(Token::MOBILE)->plainTextToken,
            $unit
        );
    }

    public function delete(Unit $unit)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::DELETE_UNIT_CONFIG_LABEL
        );

        return $this->unitConfigService->deleteConfig($unit);
    }
}
