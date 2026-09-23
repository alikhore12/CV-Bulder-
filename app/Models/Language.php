<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['cv_id', 'name', 'proficiency', 'sort_order'])]
class Language extends Model
{
    protected $table = 'cv_languages';

    public function cv(): BelongsTo
    {
        return $this->belongsTo(CV::class);
    }
}
