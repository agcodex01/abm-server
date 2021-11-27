<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Http\Services\SettingService;
use App\Permission\Permission;
use App\Permission\PermissionCapabilities;

class SettingController extends Controller
{


    public function __construct(
        private SettingService $settingService,
        private Permission $permission
    ) {
    }
    public function get()
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_SETTING_LABEL
        );
        return $this->settingService->get();
    }

    public function update(SettingRequest $request)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::UPDATE_UNITS_LABEL
        );

        return $this->settingService->update($request->validated());
    }
}
