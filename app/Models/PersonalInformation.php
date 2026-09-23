<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'cv_id', 'full_name', 'professional_title', 'email', 'phone', 'location',
    'website', 'linkedin', 'github', 'profile_photo', 'summary',
])]
class PersonalInformation extends Model
{
    protected $table = 'cv_personal_information';

    public function cv(): BelongsTo
    {
        return $this->belongsTo(CV::class);
    }
}
