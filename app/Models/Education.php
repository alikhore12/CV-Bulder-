<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'cv_id', 'degree', 'institution', 'location', 'start_date', 'end_date',
    'description', 'sort_order',
])]
class Education extends Model
{
    protected $table = 'cv_educations';

    protected function casts(): array
    {
        return [
            'start_date' => 'date:Y-m',
            'end_date' => 'date:Y-m',
        ];
    }

    public function cv(): BelongsTo
    {
        return $this->belongsTo(CV::class);
    }
}
