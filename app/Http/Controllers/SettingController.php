<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Http\Services\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private SettingService $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }
    public function get()
    {
        return $this->settingService->get();
    }

    public function update(SettingRequest $request)
    {
        return $this->settingService->update($request->validated());
    }
}
