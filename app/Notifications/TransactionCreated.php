<?php

namespace App\Notifications;

use App\Models\Transaction;
use App\Traits\Filterable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class TransactionCreated extends Notification implements ShouldQueue
{
    use Queueable, Filterable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(private Transaction $transaction)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => NotificationType::TRANSACTION_CREATED,
            'message' => $this->getMessage(),
            'link' => 'view_transaction',
            'link_data' => $this->transaction->id
        ];
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'read_at' => null,
            'data' => $this->toArray($notifiable),
            'created_at' => now()
        ]);
    }

    private function getMessage()
    {
        return $this->transaction->biller->name
            . ' -- created from '
            . $this->transaction->unit->name;
    }
}
