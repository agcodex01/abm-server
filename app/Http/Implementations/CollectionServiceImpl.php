<?php

namespace App\Http\Implementations;

use App\Filters\CollectionFilter;
use App\Http\Services\CollectionService;
use App\Http\Services\StorageService;
use App\Http\Services\UnitService;
use App\Models\Collection;
use App\Utils\StorageUtil;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class CollectionServiceImpl implements CollectionService
{

    private UnitService $unitService;
    private StorageService $storageService;

    public function __construct(UnitService $unitService, StorageService $storageService)
    {
        $this->unitService = $unitService;
        $this->storageService = $storageService;
    }

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
        $collection->images->each(fn ($image) => $this->storageService->deleteImage($image->url));

        return $collection->delete();
    }

    public function attachImages(Collection $collection, array $images): void
    {
        foreach ($images as $image) {

            $name = StorageUtil::generateFileName($image);
            $path = Collection::IMAGES_LOCATION . '/' . $name;

            $collection->images()->create([
                'name' => $name,
                'url' => $path
            ]);

            $this->storageService->uploadImage($image, $path);
        }
    }
}
