<?php

namespace App\Http\Implementations;

use App\Filters\CollectionFilter;
use App\Http\Services\CollectionService;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class CollectionServiceImpl implements CollectionService {

    public function findAll(CollectionFilter $filter): EloquentCollection
    {
        return Collection::filter($filter)->get();
    }

    public function findById(string $id): Collection
    {
        return Collection::with('unit')->find($id);
    }

    public function create(array $data): Collection
    {
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
