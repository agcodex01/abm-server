<?php

namespace App\Providers;

use App\Http\Implementations\AccountServiceImpl;
use App\Http\Implementations\BillerServiceImpl;
use App\Http\Implementations\CollectionServiceImpl;
use App\Http\Implementations\DashboardServiceImpl;
use App\Http\Implementations\RemitServiceImpl;
use App\Http\Implementations\TransactionServiceImpl;
use App\Http\Implementations\UnitServiceImpl;
use App\Http\Services\AccountService;
use App\Http\Services\BillerService;
use App\Http\Services\CollectionService;
use App\Http\Services\DashboardService;
use App\Http\Services\RemitService;
use App\Http\Services\TransactionService;
use App\Http\Services\UnitService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        AccountService::class => AccountServiceImpl::class,
        BillerService::class => BillerServiceImpl::class,
        CollectionService::class => CollectionServiceImpl::class,
        DashboardService::class => DashboardServiceImpl::class,
        RemitService::class => RemitServiceImpl::class,
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
