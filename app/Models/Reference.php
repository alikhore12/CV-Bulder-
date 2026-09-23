<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'cv_id', 'name', 'position', 'company', 'email', 'phone',
    'relationship', 'sort_order',
])]
class Reference extends Model
{
    protected $table = 'cv_references';

    public function cv(): BelongsTo
    {
        return $this->belongsTo(CV::class);
    }
}
