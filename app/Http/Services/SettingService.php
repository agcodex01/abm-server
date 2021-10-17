<?php

namespace App\Http\Services;

use App\Models\Setting;

interface SettingService
{
    /**
     * Get App Setting
     *
     * @return \App\Models\Setting
     * @return null
     */
    public function get(): Setting | null;

    /**
     * Update setting
     *
     * @param array $data settings value
     *
     * @return \App\Models\Setting
     */
    public function update(array $data): Setting;
}