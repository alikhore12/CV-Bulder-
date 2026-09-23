<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'slug', 'description', 'preview_image', 'is_active', 'sort_order'])]
class CvTemplate extends Model
{
    use HasFactory;

    protected $table = 'cv_templates';

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function cvs(): HasMany
    {
        return $this->hasMany(CV::class);
    }
}
