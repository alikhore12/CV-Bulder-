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
            'experience' => ['nullable', 'string', 'max:3000'],
            'summary' => ['nullable', 'string', 'max:3000'],
            'skills' => ['nullable', 'string', 'max:1000'],
            'education' => ['nullable', 'array', 'max:20'],
            'education.*.degree' => ['nullable', 'string', 'max:150'],
            'education.*.field' => ['nullable', 'string', 'max:150'],
            'education.*.institution' => ['nullable', 'string', 'max:200'],
            'education.*.startYear' => ['nullable', 'string', 'max:20'],
            'education.*.endYear' => ['nullable', 'string', 'max:20'],
            'education.*.description' => ['nullable', 'string', 'max:1000'],
            'education.*.totalMarks' => ['nullable', 'string', 'max:50'],
            'education.*.obtainedMarks' => ['nullable', 'string', 'max:50'],
            'education.*.percentage' => ['nullable', 'string', 'max:50'],
            'experience' => ['nullable', 'array', 'max:20'],
            'experience.*.position' => ['nullable', 'string', 'max:150'],
            'experience.*.company' => ['nullable', 'string', 'max:200'],
            'experience.*.startDate' => ['nullable', 'string', 'max:50'],
            'experience.*.endDate' => ['nullable', 'string', 'max:50'],
            'experience.*.current' => ['nullable', 'boolean'],
            'experience.*.description' => ['nullable', 'string', 'max:3000'],
            'languages' => ['nullable', 'array', 'max:20'],
            'languages.*.name' => ['nullable', 'string', 'max:100'],
            'languages.*.level' => ['nullable', 'string', 'max:100'],
            'certifications' => ['nullable', 'array', 'max:20'],
            'certifications.*.name' => ['nullable', 'string', 'max:150'],
            'certifications.*.organization' => ['nullable', 'string', 'max:150'],
            'certifications.*.date' => ['nullable', 'string', 'max:50'],
        ]);

        $cv['color'] = $cv['color'] ?? '#4f46e5';
        $cv['education'] = $cv['education'] ?? [];
        $cv['experience'] = $cv['experience'] ?? [];
        $cv['languages'] = $cv['languages'] ?? [];
        $cv['certifications'] = $cv['certifications'] ?? [];

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
