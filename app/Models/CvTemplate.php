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

    /**
     * Slugs that have a matching Blade view in resources/views/cv-templates.
     *
     * The list doubles as a whitelist: a request may only ever render one of
     * these known views, never an arbitrary user-supplied view name.
     */
    public const SLUGS = [
        'classic',
        'modern',
        'minimal',
        'elegant',
        'compact',
        'blue-cyan-wave',
        'black-yellow-sidebar',
        'minimal-dark-sidebar',
        'navy-blue-geometric',
    ];

    public const DEFAULT_SLUG = 'classic';

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

    /**
     * Resolve a slug to its Blade view, rejecting anything outside the whitelist.
     *
     * @throws \InvalidArgumentException when the slug has no known view
     */
    public static function viewFor(string $slug): string
    {
        if (! in_array($slug, self::SLUGS, true)) {
            throw new \InvalidArgumentException("Unknown CV template [{$slug}].");
        }

        return 'cv-templates.'.$slug;
    }

    public function view(): string
    {
        return self::viewFor($this->slug);
    }

    /**
     * Canonical list of templates, keyed by position in self::SLUGS.
     *
     * @return list<array{slug: string, name: string, description: string}>
     */
    public static function catalog(): array
    {
        $catalog = [
            'classic' => [
                'name' => 'Blue Professional',
                'description' => 'Navy header with angled accent shapes and a two-column layout.',
            ],
            'modern' => [
                'name' => 'Modern Teal',
                'description' => 'Accent bar header with bordered section cards, roomy and readable.',
            ],
            'minimal' => [
                'name' => 'Minimal Serif',
                'description' => 'Centred serif header, thin rules and generous white space.',
            ],
            'elegant' => [
                'name' => 'Elegant Gold',
                'description' => 'Framed sheet with gold accents and classic serif typography.',
            ],
            'compact' => [
                'name' => 'Compact Cyan',
                'description' => 'Dense two-column layout that fits more content on one page.',
            ],
            'blue-cyan-wave' => [
                'name' => 'Blue Cyan Wave Resume',
                'description' => 'Colorful A4 CV with deep navy and bright cyan wave decorative elements.',
            ],
            'black-yellow-sidebar' => [
                'name' => 'Black/Yellow Modern Sidebar',
                'description' => 'Professional vertical resume with dark sidebar and yellow accent highlights.',
            ],
            'minimal-dark-sidebar' => [
                'name' => 'Minimal Dark Sidebar Professional',
                'description' => 'Premium corporate CV with dark sidebar and clean white content area.',
            ],
            'navy-blue-geometric' => [
                'name' => 'Navy Blue Creative Geometric',
                'description' => 'Highly visual creative CV with deep navy background and geometric design elements.',
            ],
        ];

        return array_map(
            fn (string $slug): array => ['slug' => $slug, ...$catalog[$slug]],
            self::SLUGS,
        );
    }

    /**
     * Templates offered in the builder, in display order.
     *
     * Falls back to the canonical catalog when the database is unreachable, so
     * the builder keeps working on a machine where MySQL is not running.
     *
     * @return list<array{slug: string, name: string, description: string}>
     */
    public static function activeOptions(): array
    {
        try {
            $options = self::query()
                ->where('is_active', true)
                ->whereIn('slug', self::SLUGS)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get(['name', 'slug', 'description'])
                ->map(fn (self $template): array => $template->only(['name', 'slug', 'description']))
                ->values()
                ->all();
        } catch (\Throwable) {
            return self::catalog();
        }

        $catalog = self::catalog();
        $storedBySlug = collect($options)->keyBy('slug');

        return collect($catalog)
            ->map(fn (array $template): array => $storedBySlug->get($template['slug'], $template))
            ->values()
            ->all();
    }
}
