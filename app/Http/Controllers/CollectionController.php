<?php

namespace App\Http\Controllers;

use App\Filters\CollectionFilter;
use App\Http\Requests\CollectionRequest;
use App\Http\Services\CollectionService;
use App\Http\Services\UnitService;
use App\Models\Collection;

class CollectionController extends Controller
{
    public function __construct(
        private CollectionService $collectionService,
        private UnitService $unitService
    ) {
    }
    /**
     * Display a listing of the collection.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CollectionFilter $filter)
    {
        return $this->collectionService->findAll($filter);
    }

    /**
     * Store a newly created colllection.
     *
     * @param  \Illuminate\Http\CollectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectionRequest $request)
    {
        $data = $request->validated();

        $unit = $this->unitService->findById($data['unit_id']);

        if ($unit->fund < $data['total']) {
            return response([
                'errors' => [
                    'total' => [
                        'The total should not be greater than unit fund.'
                    ]
                ]
            ], 422);
        }

        $this->unitService->minusFund($unit, $data['total']);

        $collection = $this->collectionService->create($request->validated());

        if ($request->hasFile('images')) {
            $this->collectionService->attachImages($collection, $request->file('images'));
        }

        return $collection;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(string $collection)
    {
        return $this->collectionService->findById($collection);
    }

    /**
     * Update the specified collection in storage.
     *
     * @param  \Illuminate\Http\CollectionRequest  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(CollectionRequest $request, Collection $collection)
    {
        return $this->collectionService->update(
            $request->validated(),
            $collection
        );
    }

    /**
     * Remove the specified collection.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        return $this->collectionService->delete($collection);
    }
}
