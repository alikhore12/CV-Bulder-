<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'cv_id', 'job_title', 'company', 'location', 'start_date', 'end_date',
    'currently_working', 'description', 'sort_order',
])]
class Experience extends Model
{
    protected $table = 'cv_experiences';

    protected function casts(): array
    {
        return [
            'start_date' => 'date:Y-m',
            'end_date' => 'date:Y-m',
            'currently_working' => 'boolean',
        ];
    }

    public function cv(): BelongsTo
    {
        return $this->belongsTo(CV::class);
    }
}
