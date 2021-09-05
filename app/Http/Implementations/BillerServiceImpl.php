<?php

namespace App\Http\Implementations;

use App\Filters\BillerFilter;
use App\Http\Services\BillerService;
use App\Models\Biller;
use Illuminate\Database\Eloquent\Collection;

class BillerServiceImpl implements BillerService
{

    public function findAll(BillerFilter $filter): Collection
    {
        return Biller::filter($filter)->latest()->get();
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

    public function update(array $data, Biller $biller): Biller
    {
        $biller->update($data);

        return $biller;
    }

    public function delete(Biller $biller):bool
    {
        return $biller->delete();
    }
}
