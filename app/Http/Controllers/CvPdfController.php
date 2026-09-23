<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CvPdfController extends Controller
{
    public function download(Request $request): Response
    {
        $cv = $request->validate([
            'name' => ['nullable', 'string', 'max:150'],
            'headline' => ['nullable', 'string', 'max:150'],
            'location' => ['nullable', 'string', 'max:150'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
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
            'skills' => ['nullable', 'string', 'max:1000'],
            'education' => ['nullable', 'array', 'max:20'],
            'education.*.degree' => ['nullable', 'string', 'max:150'],
            'education.*.institution' => ['nullable', 'string', 'max:200'],
            'education.*.totalMarks' => ['nullable', 'string', 'max:50'],
            'education.*.obtainedMarks' => ['nullable', 'string', 'max:50'],
            'education.*.percentage' => ['nullable', 'string', 'max:50'],
        ]);

        $cv['color'] = $cv['color'] ?? '#4f46e5';
        $cv['education'] = $cv['education'] ?? [];

        return Pdf::loadView('cv-pdf', ['cv' => $cv])
            ->setPaper('a4')
            ->download('cvcraft-cv.pdf');
    }
}
