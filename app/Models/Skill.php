<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['cv_id', 'name', 'level', 'sort_order'])]
class Skill extends Model
{
    protected $table = 'cv_skills';

    public function cv(): BelongsTo
    {
        return $this->belongsTo(CV::class);
    }
}
