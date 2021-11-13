<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notification;

interface NotificationService
{
    /**
     * Notify users
     *
     * @param \Illuminate\Notifications\Notification $notification type of notifcation to sent
     *
     * @return void
     */
    public function notifyUsers(Notification $notification);

    /**
     * Fetch user notification
     *
     * @param bool $unRead
     * @param \App\Models\User $user
     *
     * @return array|\Illuminate\Notifications\DatabaseNotificationCollection
     */
    public function fetchUserNotifications(bool $unRead, User $user): array | DatabaseNotificationCollection;

    /**
     * Mark as read user notification
     *
     * @param \App\Models\User $user
     * @param string $id
     *
     * @return void
     */
    public function markAsRead(User $user, string $id): void;

    /**
     * Mark all user notifications as read
     *
     * @param \App\Models\User $user
     *
     * @return array
     */
    public function markAllAsRead(User $user): array | DatabaseNotificationCollection;
}
