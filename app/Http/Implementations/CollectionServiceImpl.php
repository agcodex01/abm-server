<?php

namespace App\Http\Implementations;

use App\Filters\CollectionFilter;
use App\Http\Services\CollectionService;
use App\Models\Collection;
use App\Utils\StorageUtil;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class CollectionServiceImpl implements CollectionService
{
    public function findAll(CollectionFilter $filter): EloquentCollection
    {
        return Collection::with('unit')->filter($filter)->get();
    }

    public function findById(string $id): Collection
    {
        return Collection::with('unit', 'images')->find($id);
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
        $collection->images()->delete();

        return $collection->delete();
    }

    public function attachImages(Collection $collection, array $images): void
    {
        foreach ($images as $image) {

            $name = StorageUtil::generateFileName($image);
            $path = 'data:image/' .  pathinfo($image, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($image));

            $collection->images()->create([
                'name' => $name,
                'url' => $path
            ]);
        }
    }
}
