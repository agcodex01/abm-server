<?php

namespace App\Http\Services;

use App\Filters\CollectionFilter;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

interface CollectionService
{
    /**
     * Get all collection;
     *
     * @param \App\Filters\CollectionFilter $filter collection filter
     *
     * @return lluminate\Database\Eloquent\Collection collection of unit.
     */
    public function findAll(CollectionFilter $filter): EloquentCollection;

    /**
     * Find collection.
     *
     * @param string $id string uuid
     *
     * @return App\Models\Collection
     */
    public function findById(string $id): Collection;

    /**
     * Create Collection.
     *
     * @param array $data  validated CollectionRequest data.
     *
     * @return App\Models\Collection
     */
    public function create(array $data): Collection;

    /**
     * Update collection
     *
     * @param array $data validated CollectionRequest data.
     * @param App\Models\Collection $collection collection object to update.
     *
     * @return bool if collection updated successfully.
     */
    public function update(array $data, Collection $collection): bool;

    /**
     * Delete Collection
     *
     * @param App\Models\Collection $collection Collection to delete.
     *
     * @return bool if collection successfully deleted.
     *
     * @throws LogicException
     */
    public function delete(Collection $collection);
}
