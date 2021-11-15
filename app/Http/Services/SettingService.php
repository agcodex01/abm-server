<?php

namespace App\Http\Services;

use App\Models\Setting;

interface SettingService
{
    const DEFAULT_FEE = 5;
    /**
     * Get App Setting
     *
     * @return \App\Models\Setting
     * @return null
     */
    public function get(): Setting | null;

    /**
     * Get or create Setting
     *
     * @return \App\Models\Setting
     */
    public function findOrCreate(): Setting;

    /**
     * Update setting
     *
     * @param array $data settings value
     *
     * @return \App\Models\Setting
     */
    public function update(array $data): Setting;
}
