<?php

namespace App\Http\Controllers;

use App\Models\CvTemplate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class CvPdfController extends Controller
{
    private const WATERMARK_BASE_SIZE = 77.0;

    private const WATERMARK_MIN_SIZE = 26.0;

    private const WATERMARK_MAX_WIDTH = 820.0;

    private const WATERMARK_CHAR_WIDTH_RATIO = 0.58;

    public function download(Request $request): Response
    {
        $cv = $request->validate([
            'template' => ['nullable', 'string', Rule::in(CvTemplate::SLUGS)],
            'name' => ['nullable', 'string', 'max:150'],
            'headline' => ['nullable', 'string', 'max:150'],
            'location' => ['nullable', 'string', 'max:150'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'website' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'github' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'string', 'max:5000000'],
            'color' => ['nullable', 'regex:/^#[0-9a-fA-F]{6}$/'],
            'fatherName' => ['nullable', 'string', 'max:150'],
            'domicile' => ['nullable', 'string', 'max:150'],
            'dateOfBirth' => ['nullable', 'date'],
            'cnicNumber' => ['nullable', 'string', 'max:30'],
            'fullAddress' => ['nullable', 'string', 'max:500'],
            'otherInformation' => ['nullable', 'string', 'max:2000'],
            'jobTitle' => ['nullable', 'string', 'max:150'],
            'company' => ['nullable', 'string', 'max:150'],
            'startDate' => ['nullable', 'string', 'max:50'],
            'endDate' => ['nullable', 'string', 'max:50'],
            'summary' => ['nullable', 'string', 'max:3000'],
            'skills' => ['nullable'],
            'education' => ['nullable', 'array', 'max:20'],
            'education.*.degree' => ['nullable', 'string', 'max:150'],
            'education.*.field' => ['nullable', 'string', 'max:150'],
            'education.*.institution' => ['nullable', 'string', 'max:200'],
            'education.*.location' => ['nullable', 'string', 'max:150'],
            'education.*.startYear' => ['nullable', 'string', 'max:20'],
            'education.*.endYear' => ['nullable', 'string', 'max:20'],
            'education.*.description' => ['nullable', 'string', 'max:1000'],
            'education.*.totalMarks' => ['nullable', 'string', 'max:50'],
            'education.*.obtainedMarks' => ['nullable', 'string', 'max:50'],
            'education.*.percentage' => ['nullable', 'string', 'max:50'],
            'experience' => ['nullable', 'array', 'max:20'],
            'experience.*.position' => ['nullable', 'string', 'max:150'],
            'experience.*.company' => ['nullable', 'string', 'max:200'],
            'experience.*.location' => ['nullable', 'string', 'max:150'],
            'experience.*.startDate' => ['nullable', 'string', 'max:50'],
            'experience.*.endDate' => ['nullable', 'string', 'max:50'],
            'experience.*.current' => ['nullable', 'boolean'],
            'experience.*.description' => ['nullable', 'string', 'max:3000'],
            'languages' => ['nullable', 'array', 'max:20'],
            'languages.*.name' => ['nullable', 'string', 'max:100'],
            'languages.*.proficiency' => ['nullable', 'string', 'max:100'],
            'languages.*.level' => ['nullable', 'string', 'max:100'],
            'certifications' => ['nullable', 'array', 'max:20'],
            'certifications.*.name' => ['nullable', 'string', 'max:150'],
            'certifications.*.organization' => ['nullable', 'string', 'max:150'],
            'certifications.*.date' => ['nullable', 'string', 'max:50'],
            'certifications.*.issueDate' => ['nullable', 'date_format:Y-m'],
            'certifications.*.expiryDate' => ['nullable', 'date_format:Y-m'],
            'certifications.*.credentialId' => ['nullable', 'string', 'max:100'],
            'certifications.*.credentialUrl' => ['nullable', 'url', 'max:500'],
            'projects' => ['nullable', 'array', 'max:20'],
            'projects.*.name' => ['nullable', 'string', 'max:200'],
            'projects.*.role' => ['nullable', 'string', 'max:150'],
            'projects.*.technologies' => ['nullable', 'string', 'max:500'],
            'projects.*.url' => ['nullable', 'url', 'max:500'],
            'projects.*.githubUrl' => ['nullable', 'url', 'max:500'],
            'projects.*.description' => ['nullable', 'string', 'max:3000'],
            'references' => ['nullable', 'array', 'max:10'],
            'references.*.name' => ['nullable', 'string', 'max:150'],
            'references.*.position' => ['nullable', 'string', 'max:150'],
            'references.*.company' => ['nullable', 'string', 'max:200'],
            'references.*.email' => ['nullable', 'email', 'max:255'],
            'references.*.phone' => ['nullable', 'string', 'max:50'],
            'references.*.relationship' => ['nullable', 'string', 'max:500'],
        ]);

        $cv['color'] = $cv['color'] ?? '#f4c400';
        $cv['education'] = $cv['education'] ?? [];
        $cv['experience'] = $cv['experience'] ?? [];
        $cv['languages'] = $cv['languages'] ?? [];
        $cv['certifications'] = $cv['certifications'] ?? [];
        $cv['projects'] = $cv['projects'] ?? [];
        $cv['references'] = $cv['references'] ?? [];

        $skillItems = is_array($cv['skills'] ?? null)
            ? collect($cv['skills'])
                ->filter(fn (mixed $skill): bool => is_array($skill) && filled($skill['name'] ?? null))
                ->map(fn (array $skill): array => [
                    'name' => (string) $skill['name'],
                    'level' => (string) ($skill['level'] ?? ''),
                ])
                ->values()
                ->all()
            : collect(explode(',', (string) ($cv['skills'] ?? '')))
                ->map(fn (string $skill): array => ['name' => trim($skill), 'level' => ''])
                ->filter(fn (array $skill): bool => $skill['name'] !== '')
                ->values()
                ->all();

        $cv['skillItems'] = $skillItems;

        if (is_array($cv['skills'] ?? null)) {
            $cv['skills'] = collect($skillItems)->pluck('name')->implode(', ');
        }

        foreach ($cv['languages'] as &$language) {
            $language['level'] = $language['proficiency'] ?? $language['level'] ?? '';
        }
        unset($language);

        foreach ($cv['certifications'] as &$certification) {
            $certification['date'] = $certification['issueDate'] ?? $certification['date'] ?? '';
        }
        unset($certification);

        $templateSlug = in_array($cv['template'] ?? null, CvTemplate::SLUGS, true)
            ? $cv['template']
            : CvTemplate::DEFAULT_SLUG;

        $watermarkText = trim(($cv['name'] ?? '').' CV');

        return Pdf::loadView(CvTemplate::viewFor($templateSlug), [
            'cv' => $cv,
            'watermarkText' => $watermarkText,
            'watermarkSize' => $this->watermarkFontSize($watermarkText),
        ])
            ->setPaper('a4')
            ->download('cvcraft-cv.pdf');
    }

    /**
     * Font size, in px, that keeps the rotated watermark inside the A4 page width.
     */
    private function watermarkFontSize(string $text): float
    {
        $characters = max(mb_strlen($text), 1);
        $size = min(
            self::WATERMARK_BASE_SIZE,
            self::WATERMARK_MAX_WIDTH / ($characters * self::WATERMARK_CHAR_WIDTH_RATIO)
        );

        return round(max(self::WATERMARK_MIN_SIZE, $size), 1);
    }
}
