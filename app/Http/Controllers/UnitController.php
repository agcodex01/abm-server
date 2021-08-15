<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitRequest;
use App\Http\Services\UnitService;
use App\Models\Unit;

class UnitController extends Controller
{
    private UnitService $unitService;

    public function __construct(UnitService $unitService)
    {
        $this->unitService = $unitService;
    }

    public function index()
    {
        return $this->unitService->findAll();
    }

    public function show(Unit $unit)
    {
        return $unit;
    }

    public function store(UnitRequest $request)
    {
        return $this->unitService->create($request->validated());
    }

    public function update(UnitRequest $request, Unit $unit)
    {
        return $this->unitService
            ->update($request->validated(), $unit);
    }

    public function destroy(Unit $unit)
    {
        return $this->unitService->delete($unit);
    }
}
