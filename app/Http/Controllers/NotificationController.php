<?php

namespace App\Http\Controllers;

use App\Http\Services\NotificationService;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct(private NotificationService $notificationService)
    {
    }

    public function notifications(Request $request, User $user)
    {
        return $this->notificationService->fetchUserNotifications($request->unRead, $user);
    }

    public function read(User $user, string $id)
    {
        $this->notificationService->markAsRead($user, $id);
    }

    public function markAllAsRead(User $user)
    {
       return $this->notificationService->markAllAsRead($user);
    }
}
