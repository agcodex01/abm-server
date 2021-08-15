<?php

namespace App\Http\Services;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Collection;
use LogicException;

interface UnitService
{
    /**
     * Get all units;
     *
     * @return lluminate\Database\Eloquent\Collection collection of unit.
     */
    public function findAll(): Collection;

    /**
     * Find Unit by ID.
     *
     * @param int $id
     *
     * @return App\Models\Unit
     */
    public function findById(int $id): Unit;

    /**
     * Create Unit.
     *
     * @param array $data  validated UnitRequest data.
     *
     * @return App\Models\Unit
     */
    public function create(array $data): Unit;

    /**
     * Update unit
     *
     * @param array $data validated UnitRequest data.
     * @param App\Models\Unit $unit unit object to update.
     *
     * @return bool if unit successfully updated.
     */
    public function update(array $data, Unit $unit): bool;

    /**
     * Delete Unit
     *
     * @param App\Models\Unit $unit Unit to delete.
     *
     * @return bool if unit successfully deleted.
     *
     * @throws LogicException
     */
    public function delete(Unit $unit);
}
