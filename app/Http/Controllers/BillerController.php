<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillerRequest;
use App\Http\Services\BillerService;
use App\Models\Biller;

class BillerController extends Controller
{
    private BillerService $billerService;

    public function __construct(BillerService $billerService) {
        $this->billerService = $billerService;
    }

    public function index()
    {
        return $this->billerService->findAll();
    }

    public function types()
    {
        return $this->billerService->types();
    }

    public function show(Biller $biller)
    {
        return $biller;
    }

    public function store(BillerRequest $request)
    {
        return $this->billerService->create($request->validated());
    }

    public function update(BillerRequest $request, Biller $biller)
    {
        return $this->billerService->update($request->validated(), $biller);
    }

    public function destroy(Biller $biller)
    {
        return $this->billerService->delete($biller);
    }
}
