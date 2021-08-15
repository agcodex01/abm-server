<?php

namespace App\Http\Implementations;

use App\Http\Services\BillerService;
use App\Models\Biller;
use Illuminate\Database\Eloquent\Collection;

class BillerServiceImpl implements BillerService
{

    public function findAll(): Collection
    {
        return Biller::all();
    }

    public function types(): array
    {
        return Biller::getBillerTypes();
    }

    public function findById(int $id): Biller
    {
        return Biller::findOrFail($id);
    }

    public function create(array $data): Biller
    {
        return Biller::create($data);
    }

    public function update(array $data, Biller $biller): bool
    {
        return $biller->update($data);
    }

    public function delete(Biller $biller):bool
    {
        return $biller->delete();
    }
}
