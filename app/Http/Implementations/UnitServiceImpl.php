<?php

namespace App\Http\Implementations;

use App\Http\Services\UnitService;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Collection;

class UnitServiceImpl implements UnitService
{
    public function findAll(): Collection
    {
        return Unit::all();
    }
    public function findById(int $id): Unit
    {
        return Unit::findOrFail($id);
    }

    public function create(array $data): Unit
    {
        return Unit::create($data);
    }

    public function update(array $data, Unit $unit): bool
    {
        return $unit->update($data);
    }

    public function delete(Unit $unit)
    {
        return $unit->delete();
    }
}