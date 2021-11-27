<?php

namespace App\Http\Controllers;

use App\Http\Services\DashboardService;
use App\Models\Transaction;
use App\Permission\Permission;
use App\Permission\PermissionCapabilities;

class DashboardController extends Controller
{

    public function __construct(
        private DashboardService $dashboardService,
        private Permission $permission
    ) {
    }

    public function summary()
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_DASHBOARD_LABEL
        );

        return $this->dashboardService->getDsSummary();
    }

    public function transactionPreview()
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_DASHBOARD_LABEL
        );

        return $this->dashboardService->transactionPreview();
    }
}
