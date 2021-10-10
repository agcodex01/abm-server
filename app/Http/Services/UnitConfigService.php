<?php

namespace App\Http\Services;

use App\Models\Unit;
use App\Models\UnitConfig;

interface UnitConfigService
{
    /**
     * Get unit config
     *
     * @param \App\Models\Unit $unit
     *
     * @return \App\Models\UnitConfig
     */
    public function getConfig(Unit $unit): UnitConfig | null;


    /**
     * Create unit config
     *
     * @param string $token
     * @param \App\Models\Unit $unit
     *
     * @return \App\Models\UnitConfig
     */
    public function createConfig(string $token, Unit $unit): UnitConfig;

    /**
     * Delete unit config
     *
     * @param \App\Models\Unit $unit
     *
     * @return bool
     */
    public function deleteConfig(Unit $unit): bool;
}
