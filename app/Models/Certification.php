<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'cv_id', 'name', 'organization', 'issue_date', 'expiry_date',
    'credential_url', 'sort_order',
])]
class Certification extends Model
{
    protected $table = 'cv_certifications';

    protected function casts(): array
    {
        return [
            'issue_date' => 'date:Y-m',
            'expiry_date' => 'date:Y-m',
        ];
    }

    public function cv(): BelongsTo
    {
        return $this->belongsTo(CV::class);
    }
}
