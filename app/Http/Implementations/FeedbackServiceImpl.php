<?php

namespace App\Http\Implementations;

use App\Http\Services\FeedbackService;
use App\Models\Feedback;
use Illuminate\Database\Eloquent\Collection;

class FeedbackServiceImpl implements FeedbackService
{
    public function findAll(): Collection
    {
        return Feedback::with('account.biller', 'unit')
            ->latest()
            ->get();
    }


    public function create(array $data): Feedback
    {
        return Feedback::create($data);
    }
}
