<?php

namespace App\Http\Controllers;

use App\Http\Services\UnitConfigService;
use App\Models\Unit;

class UnitConfigController extends Controller
{
    private UnitConfigService $unitConfigService;

    public function __construct(UnitConfigService $unitConfigService)
    {
        $this->unitConfigService = $unitConfigService;
    }

    public function getConfig(Unit $unit)
    {
        return $this->unitConfigService->getConfig($unit);
    }

    public function store(Unit $unit)
    {
        return $this->unitConfigService->createConfig(
            $unit->createToken('mobile_token')->plainTextToken,
            $unit
        );
    }

    public function delete(Unit $unit)
    {
        return $this->unitConfigService->deleteConfig($unit);
    }
}
