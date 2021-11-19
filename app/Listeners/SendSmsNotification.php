<?php

namespace App\Listeners;

use App\Events\NewTransactionCreated;
use App\Http\Services\SmsService;

class SendSmsNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(private SmsService $smsService)
    {
        //
    }

    /**
     * Send SMS to customers.
     *
     * @param  \App\Events\NewTransactionCreated  $event
     * @return void
     */
    public function handle(NewTransactionCreated $event)
    {
        $unitName = $event->transaction->unit->name;
        $billerName = $event->transaction->biller->name;
        $amount = $event->transaction->amount;
        $number = $event->transaction->number;

        $message =  [
            "Your transaction created from $unitName with an amount of $amount is on progress.",
            "We will remit this to $billerName at the end of this day."
        ];

        for ($i = 0; $i < 2; $i++) {
            $result =  $this->smsService
                ->to($number)
                ->message($message[$i])
                ->send();
            error_log("SMS Response : $result");
        }
    }
}
