<?php

namespace App\Http\Implementations;

use App\Http\Services\SettingService;
use App\Models\Setting;

class SettingServiceImpl implements SettingService
{

    public function get(): Setting | null
    {
        return $this->findOrCreate();
    }

    public function findOrCreate(): Setting
    {
        return Setting::firstOrCreate([
            'fee' => 5
        ]);
    }

    public function update(array $data): Setting
    {
        $setting = Setting::first();
        $setting->update($data);

        return $setting;
    }
}
