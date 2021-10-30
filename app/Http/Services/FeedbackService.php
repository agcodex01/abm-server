<?php

namespace App\Http\Services;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Collection;

interface FeedbackService
{
    /**
     * Find all feedback
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll(): Collection;

    /**
     * Create new feedback
     *
     * @param array $data feedback fields
     *
     * @return \App\Models\Feedback
     */
    public function create(array $data): Feedback;
}
