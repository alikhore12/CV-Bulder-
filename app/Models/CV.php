<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

#[Fillable(['user_id', 'cv_template_id', 'title', 'slug', 'status', 'current_step', 'completion', 'last_edited_at'])]
class CV extends Model
{
    use HasFactory;

    protected $table = 'cvs';

    protected function casts(): array
    {
        return [
            'last_edited_at' => 'datetime',
            'completion' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $cv) {
            if (empty($cv->slug)) {
                $cv->slug = Str::slug($cv->title).'-'.Str::lower(Str::random(6));
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(CvTemplate::class, 'cv_template_id');
    }

    public function personalInformation(): HasOne
    {
        return $this->hasOne(PersonalInformation::class);
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class)->orderByDesc('start_date')->orderByDesc('id');
    }

    public function educations(): HasMany
    {
        return $this->hasMany(Education::class)->orderByDesc('start_date')->orderByDesc('id');
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class)->orderBy('sort_order')->orderBy('id');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class)->orderBy('sort_order')->orderBy('id');
    }

    public function certifications(): HasMany
    {
        return $this->hasMany(Certification::class)->orderByDesc('issue_date')->orderByDesc('id');
    }

    public function languages(): HasMany
    {
        return $this->hasMany(Language::class)->orderBy('sort_order')->orderBy('id');
    }

    public function references(): HasMany
    {
        return $this->hasMany(Reference::class)->orderBy('sort_order')->orderBy('id');
    }

    public function aiGenerations(): HasMany
    {
        return $this->hasMany(AiGeneration::class);
    }

    public function scopeForUser($query, User $user)
    {
        return $query->where('user_id', $user->id);
    }
}
