<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'cv_id', 'type', 'prompt', 'response', 'status', 'tokens'])]
class AiGeneration extends Model
{
    protected $table = 'ai_generations';

    protected function casts(): array
    {
        return [
            'tokens' => 'integer',
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
