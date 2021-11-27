<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Http\Services\FeedbackService;
use App\Permission\Permission;
use App\Permission\PermissionCapabilities;

class FeedbackController extends Controller
{

    public function __construct(
        private FeedbackService $feedbackService,
        private Permission $permission
    ) {
    }
    public function index()
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_FEEDBACKS_LABEL
        );

        return $this->feedbackService->findAll();
    }

    public function create(FeedbackRequest $request)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::CREATE_FEEDBACKS_LABEL
        );

        return $this->feedbackService->create($request->validated());
    }
}
