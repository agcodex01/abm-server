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
        $setting = Setting::first();

        if (!$setting) {
            $setting = Setting::create([
                'fee' => SettingService::DEFAULT_FEE
            ]);
        }

        return $setting;
    }

    public function update(array $data): Setting
    {
        $setting = $this->findOrCreate();
        $setting->update($data);

        return $setting;
    }
}
