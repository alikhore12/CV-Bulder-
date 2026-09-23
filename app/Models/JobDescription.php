<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'cv_id', 'job_title', 'content', 'analysis'])]
class JobDescription extends Model
{
    protected $table = 'job_descriptions';

    protected function casts(): array
    {
        return [
            'analysis' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cv(): BelongsTo
    {
        return $this->belongsTo(CV::class);
    }
}
