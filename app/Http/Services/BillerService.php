<?php

namespace App\Http\Services;

use App\Models\Biller;
use Illuminate\Database\Eloquent\Collection;

interface BillerService
{
    /**
     * Get all billers;
     *
     * @return lluminate\Database\Eloquent\Collection collection of billers.
     */
    public function findAll(): Collection;

    /**
     * Get all biller types;
     *
     * @return string[]
     */
    public function types(): array;

     /**
     * Find Biller by ID.
     *
     * @param int $id
     *
     * @return App\Models\Biller
     */
    public function findById(int $id): Biller;

    /**
     * Create Biller.
     *
     * @param array $data  validated BillerRequest data.
     *
     * @return App\Models\Biller
     */
    public function create(array $data): Biller;

    /**
     * Update Biller
     *
     * @param array $data validated BillerRequest data.
     * @param App\Models\Biller $biller biller object to update.
     *
     * @return bool if biller successfully updated.
     */
    public function update(array $data, Biller $biller): bool;

    /**
     * Delete Biller
     *
     * @param App\Models\Biller $biller Biller to delete.
     *
     * @return bool if biller successfully deleted.
     *
     * @throws LogicException
     */
    public function delete(Biller $biller):bool;
}
