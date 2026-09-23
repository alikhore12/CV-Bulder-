<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'cv_id', 'name', 'role', 'technologies', 'url', 'description', 'sort_order',
])]
class Project extends Model
{
    protected $table = 'cv_projects';

    public function cv(): BelongsTo
    {
        return $this->belongsTo(CV::class);
    }
}
