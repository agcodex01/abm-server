<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Http\Services\FeedbackService;

class FeedbackController extends Controller
{
    private FeedbackService $feedbackService;

    public function __construct(FeedbackService $feedbackService)
    {
        $this->feedbackService = $feedbackService;
    }
    public function index()
    {
        return $this->feedbackService->findAll();
    }

    public function create(FeedbackRequest $request)
    {
        return $this->feedbackService->create($request->validated());
    }
}
