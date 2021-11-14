<?php

namespace App\Http\Implementations;

use App\Http\Services\UnitService;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Collection;

class UnitServiceImpl implements UnitService
{
    public function findAll(): Collection
    {
        return Unit::withCount('collections', 'transactions')->get();
    }
    public function findById(string $id): Unit
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

    public function addFund(Unit $unit, int $amount): bool
    {
        return $unit->update([
            'fund' => $unit->fund + $amount
        ]);
    }

    public function minusFund(Unit $unit, int $amount)
    {
        if ($unit->fund >= $amount) {
            return $unit->update([
                'fund' => $unit->fund - $amount
            ]);
        }
    }
}
