<?php

namespace App\Http\Controllers;

use App\Http\Services\NotificationService;
use App\Models\User;
use App\Permission\Permission;
use App\Permission\PermissionCapabilities;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct(
        private NotificationService $notificationService,
        private Permission $permission
    ) {
    }

    public function notifications(Request $request, User $user)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_NOTIFICATIONS_LABEL
        );

        return $this->notificationService->fetchUserNotifications($request->unRead, $user);
    }

    public function read(User $user, string $id)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::MARK_AS_READ_NOTIFICATIONS_LABEL
        );

        $this->notificationService->markAsRead($user, $id);
    }

    public function markAllAsRead(User $user)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::MARK_AS_READ_NOTIFICATIONS_LABEL
        );

        return $this->notificationService->markAllAsRead($user);
    }
}
