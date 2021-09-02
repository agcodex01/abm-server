<?php

namespace App\Http\Controllers;

use App\Filters\RemitFilter;
use App\Http\Requests\RemitRequest;
use App\Http\Services\RemitService;
use App\Models\Remit;

class RemitController extends Controller
{
    private RemitService $remitService;

    public function __construct(RemitService $remitService) {
        $this->remitService = $remitService;
    }

    public function index(RemitFilter $filter)
    {
        return $this->remitService->findAll($filter);
    }

    public function findRemitTransactions(Remit $remit)
    {
        return $this->remitService->findRemitTransactions($remit);
    }

    public function show(Remit $remit)
    {
        return $this->remitService->find($remit);
    }

    public function store(RemitRequest $request)
    {
        return $this->remitService->create($request->validated());
    }
}
