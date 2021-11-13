<?php

namespace App\Http\Implementations;

use App\Http\Services\NotificationService;
use App\Models\User;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class NotificationServiceImpl implements NotificationService
{
    public function notifyUsers(Notification $notification)
    {
        FacadesNotification::send(User::all(), $notification);
    }

    public function fetchUserNotifications(bool $unRead, User $user): array | DatabaseNotificationCollection
    {
        if ($unRead === true) {
            return  $user->notifications()->whereNull('read_at')->get();
        }

        return $user->notifications;
    }

    public function markAsRead(User $user, string $id): void
    {
        $user->notifications()->findOrFail($id)->markAsRead();
    }

    public function markAllAsRead(User $user): array | DatabaseNotificationCollection
    {
        $user->unreadNotifications->markAsRead();

        return $user->notifications;
    }
}
