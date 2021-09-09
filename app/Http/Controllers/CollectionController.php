<?php

namespace App\Http\Controllers;

use App\Filters\CollectionFilter;
use App\Http\Requests\CollectionRequest;
use App\Http\Services\CollectionService;
use App\Models\Collection;

class CollectionController extends Controller
{
    private CollectionService $collectionService;

    public function __construct(CollectionService $collectionService)
    {
        $this->collectionService = $collectionService;
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
        return $this->collectionService->create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        return $this->collectionService->findCollection($collection);
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
