<?php

namespace App\Providers;

use App\Http\Implementations\AccountServiceImpl;
use App\Http\Implementations\BillerServiceImpl;
use App\Http\Implementations\CollectionServiceImpl;
use App\Http\Implementations\DashboardServiceImpl;
use App\Http\Implementations\FeedbackServiceImpl;
use App\Http\Implementations\ITextMoServiceImpl;
use App\Http\Implementations\NotificationServiceImpl;
use App\Http\Implementations\RemitServiceImpl;
use App\Http\Implementations\SettingServiceImpl;
use App\Http\Implementations\TransactionServiceImpl;
use App\Http\Implementations\UnitConfigServiceImpl;
use App\Http\Implementations\UnitServiceImpl;
use App\Http\Implementations\UserServiceImpl;
use App\Http\Services\AccountService;
use App\Http\Services\BillerService;
use App\Http\Services\CollectionService;
use App\Http\Services\DashboardService;
use App\Http\Services\FeedbackService;
use App\Http\Services\NotificationService;
use App\Http\Services\RemitService;
use App\Http\Services\SettingService;
use App\Http\Services\SmsService;
use App\Http\Services\TransactionService;
use App\Http\Services\UnitConfigService;
use App\Http\Services\UnitService;
use App\Http\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        AccountService::class => AccountServiceImpl::class,
        BillerService::class => BillerServiceImpl::class,
        CollectionService::class => CollectionServiceImpl::class,
        DashboardService::class => DashboardServiceImpl::class,
        FeedbackService::class => FeedbackServiceImpl::class,
        NotificationService::class => NotificationServiceImpl::class,
        RemitService::class => RemitServiceImpl::class,
        SettingService::class => SettingServiceImpl::class,
        SmsService::class => ITextMoServiceImpl::class,
        TransactionService::class => TransactionServiceImpl::class,
        UnitConfigService::class => UnitConfigServiceImpl::class,
        UnitService::class => UnitServiceImpl::class,
        UserService::class => UserServiceImpl::class,
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
