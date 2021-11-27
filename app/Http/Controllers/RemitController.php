<?php

namespace App\Http\Controllers;

use App\Filters\RemitFilter;
use App\Http\Requests\RemitRequest;
use App\Http\Services\RemitService;
use App\Models\Remit;
use App\Permission\Permission;
use App\Permission\PermissionCapabilities;

class RemitController extends Controller
{

    public function __construct(
        private RemitService $remitService,
        private Permission $permission
    ) {
    }

    public function index(RemitFilter $filter)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_REMITS_LABEL
        );

        return $this->remitService->findAll($filter);
    }

    public function findRemitTransactions(Remit $remit)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_REMITS_LABEL
        );

        return $this->remitService->findRemitTransactions($remit);
    }

    public function show(Remit $remit)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_REMITS_LABEL
        );

        return $this->remitService->find($remit);
    }

    public function store(RemitRequest $request)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::CREATE_REMITS_LABEL
        );

        return $this->remitService->create($request->validated());
    }

    public function download(Remit $remit)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::DOWNLOAD_REMITS_LABEL
        );

        return $this->remitService->downloadReport($remit);
    }
}
