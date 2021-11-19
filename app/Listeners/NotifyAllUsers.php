<?php

namespace App\Listeners;

use App\Events\NewTransactionCreated;
use App\Http\Services\NotificationService;
use App\Notifications\TransactionCreated;

class NotifyAllUsers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(private NotificationService $notificationService)
    {
        //
    }

    /**
     * Notify system users new transaction created.
     *
     * @param  \App\Events\NewTransactionCreated  $event
     * @return void
     */
    public function handle(NewTransactionCreated $event)
    {
        $this->notificationService->notifyUsers(new TransactionCreated($event->transaction));
    }
}
