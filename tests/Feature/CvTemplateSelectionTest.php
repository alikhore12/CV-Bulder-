<?php

namespace Tests\Feature;

use App\Models\CvTemplate;
use Database\Seeders\CvTemplateSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CvTemplateSelectionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return array<string, mixed>
     */
    private function cvPayload(): array
    {
        return [
            'name' => 'Ali Khore',
            'headline' => 'Senior Software Engineer',
            'email' => 'ali@example.com',
            'phone' => '+92 300 1234567',
            'location' => 'Lahore, Pakistan',
            'summary' => 'Senior engineer with eight years of Laravel experience.',
            'skills' => 'Laravel, PHP, MySQL',
            'fullAddress' => 'House 12, Street 4, Lahore',
            'cnicNumber' => '35202-1234567-1',
            'education' => [[
                'degree' => 'BS Computer Science',
                'institution' => 'PUCIT',
                'startYear' => '2013',
                'endYear' => '2017',
                'obtainedMarks' => '720',
                'totalMarks' => '800',
                'percentage' => '88%',
            ]],
            'experience' => [[
                'position' => 'Backend Engineer',
                'company' => 'Acme',
                'startDate' => '2020',
                'current' => true,
                'description' => 'Led the payments team.',
            ]],
            'languages' => [['name' => 'English', 'level' => 'Fluent']],
            'certifications' => [['name' => 'AWS SAA', 'organization' => 'Amazon', 'date' => '2023']],
        ];
    }

    public function test_the_builder_page_offers_every_catalogue_template(): void
    {
        $this->seed(CvTemplateSeeder::class);

        $response = $this->get(route('cv-builder'));

        $response->assertOk();

        foreach (CvTemplate::SLUGS as $slug) {
            $response->assertSee("template === '{$slug}'", escape: false);
        }
    }

    public function test_the_builder_page_falls_back_to_the_catalogue_when_no_rows_exist(): void
    {
        $this->assertSame(0, CvTemplate::count());

        $response = $this->get(route('cv-builder'));

        $response->assertOk();
        $response->assertSee('Blue Professional', escape: false);
    }

    /**
     * Each template is distinguished by markup only that template uses.
     *
     * @return array<string, array{string, string}>
     */
    public static function pdfTemplates(): array
    {
        return [
            'classic' => ['classic', 'class="shape shape-two"'],
            'modern' => ['modern', 'class="card"'],
            'minimal' => ['minimal', 'class="cell"'],
            'elegant' => ['elegant', 'class="detail-cell"'],
            'compact' => ['compact', 'class="rows"'],
        ];
    }

    #[DataProvider('pdfTemplates')]
    public function test_each_template_renders_its_own_layout(string $slug, string $marker): void
    {
        $html = view(CvTemplate::viewFor($slug), [
            'cv' => $this->cvPayload(),
            'watermarkText' => 'Ali Khore CV',
            'watermarkSize' => 77,
        ])->render();

        $this->assertStringContainsString($marker, $html);
        $this->assertStringContainsString('Ali Khore', $html);
        $this->assertStringContainsString('Ali Khore CV', $html);
    }

    #[DataProvider('pdfTemplates')]
    public function test_the_pdf_endpoint_serves_each_template(string $slug): void
    {
        $response = $this->postJson(route('cv-builder.pdf'), $this->cvPayload() + ['template' => $slug]);

        $response->assertOk();
        $this->assertStringStartsWith('%PDF', $response->getContent());
    }

    public function test_an_unknown_template_is_rejected(): void
    {
        $response = $this->postJson(route('cv-builder.pdf'), $this->cvPayload() + ['template' => '../../welcome']);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('template');
    }

    public function test_the_endpoint_falls_back_to_the_classic_template_when_none_is_requested(): void
    {
        $response = $this->postJson(route('cv-builder.pdf'), $this->cvPayload());

        $response->assertOk();
        $this->assertStringStartsWith('%PDF', $response->getContent());
    }

    public function test_a_template_name_can_never_escape_the_view_whitelist(): void
    {
        $this->assertSame('cv-templates.classic', CvTemplate::viewFor(CvTemplate::DEFAULT_SLUG));

        $this->expectException(\InvalidArgumentException::class);

        // @phpstan-ignore-next-line
        CvTemplate::viewFor('../layouts/app');
    }
}
