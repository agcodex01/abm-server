<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitRequest;
use App\Http\Services\UnitService;
use App\Models\Unit;
use App\Permission\Permission;
use App\Permission\PermissionCapabilities;

class UnitController extends Controller
{


    public function __construct(
        private UnitService $unitService,
        private Permission $permission
    ) {
    }

    public function index()
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_UNITS_LABEL
        );

        return $this->unitService->findAll();
    }

    public function show(Unit $unit)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_UNITS_LABEL
        );

        return $unit;
    }

    public function store(UnitRequest $request)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::CREATE_UNITS_LABEL
        );

        return $this->unitService->create($request->validated());
    }

    public function update(UnitRequest $request, Unit $unit)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::UPDATE_UNITS_LABEL
        );

        return $this->unitService
            ->update($request->validated(), $unit);
    }

    public function destroy(Unit $unit)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::DELETE_UNITS_LABEL
        );

        return $this->unitService->delete($unit);
    }
}
