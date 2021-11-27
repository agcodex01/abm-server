<?php

namespace App\Http\Controllers;

use App\Filters\BillerFilter;
use App\Http\Requests\BillerRequest;
use App\Http\Services\BillerService;
use App\Models\Biller;
use App\Permission\Permission;
use App\Permission\PermissionCapabilities;

class BillerController extends Controller
{
    public function __construct(
        private BillerService $billerService,
        private Permission $permission
    ) {
    }

    public function index(BillerFilter $filter)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_BILLERS_LABEL
        );

        return $this->billerService->findAll($filter);
    }

    public function types()
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_BILLERS_LABEL
        );

        return $this->billerService->types();
    }

    public function show(Biller $biller)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_BILLERS_LABEL
        );

        return $biller;
    }

    public function store(BillerRequest $request)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::CREATE_BILLERS_LABEL
        );

        return $this->billerService->create($request->validated());
    }

    public function update(BillerRequest $request, Biller $biller)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::UPDATE_BILLERS_LABEL
        );

        return $this->billerService->update($request->validated(), $biller);
    }

    public function destroy(Biller $biller)
    {
        return $this->billerService->delete($biller);
    }
}
