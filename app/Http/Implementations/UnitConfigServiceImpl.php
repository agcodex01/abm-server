<?php

namespace App\Http\Implementations;

use App\Http\Services\UnitConfigService;
use App\Models\Unit;
use App\Models\UnitConfig;

class UnitConfigServiceImpl implements UnitConfigService {

    public function getConfig(Unit $unit): UnitConfig | null
    {
        return $unit->config;
    }

    public function createConfig(string $token, Unit $unit): UnitConfig
    {
        return $unit->config()->create([
            'token' => $token
        ]);
    }

    public function deleteConfig(Unit $unit): bool
    {
        $unit->tokens()->delete();

        return $unit->config()->delete();
    }
}
