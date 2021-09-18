<?php

namespace App\Http\Controllers;

use App\Http\Services\DashboardService;
use App\Models\Transaction;

class DashboardController extends Controller
{
    private DashboardService $dashboardService;

    public function __construct(DashboardService $dashboardService) {
        $this->dashboardService = $dashboardService;
    }

    public function summary()
    {
        return $this->dashboardService->getDsSummary();
    }

    public function transactionPreview()
    {
        return $this->dashboardService->transactionPreview();
    }
}
