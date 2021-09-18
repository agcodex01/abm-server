<?php

namespace App\Http\Implementations;

use App\Filters\CollectionFilter;
use App\Http\Services\CollectionService;
use App\Http\Services\UnitService;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class CollectionServiceImpl implements CollectionService
{

    private UnitService $unitService;

    public function __construct(UnitService $unitService)
    {
        $this->unitService = $unitService;
    }

    public function findAll(CollectionFilter $filter): EloquentCollection
    {
        return Collection::with('unit')->filter($filter)->get();
    }

    public function findById(string $id): Collection
    {
        return Collection::with('unit')->find($id);
    }

    public function create(array $data): Collection
    {
        $unit = $this->unitService->findById($data['unit_id']);
        $this->unitService->minusFund($unit, $data['total']);
        return Collection::create($data);
    }

    public function update(array $data, Collection $collection): bool
    {
        return $collection->update($data);
    }

    public function delete(Collection $collection)
    {
        return $collection->delete();
    }
}
