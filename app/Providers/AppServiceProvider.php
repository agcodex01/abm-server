<?php

namespace App\Providers;

use App\Http\Implementations\BillerServiceImpl;
use App\Http\Implementations\TransactionServiceImpl;
use App\Http\Implementations\UnitServiceImpl;
use App\Http\Services\BillerService;
use App\Http\Services\TransactionService;
use App\Http\Services\UnitService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        BillerService::class => BillerServiceImpl::class,
        TransactionService::class => TransactionServiceImpl::class,
        UnitService::class => UnitServiceImpl::class
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
