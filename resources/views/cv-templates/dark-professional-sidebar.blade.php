<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $cv['name'] ?? 'Professional CV' }}</title>
    <style>
        @page { size: A4; margin: 0; }
        * { box-sizing: border-box; }
        body { margin: 0; color: #f1f5f9; font: 10px/1.55 system-ui, -apple-system, Segoe UI, Roboto, sans-serif; background: #0f172a; }
        .sidebar { min-width: 280px; background: #1e293b; color: #f1f5f9; padding: 36px 24px 24px; }
        .sidebar .photo { width: 100%; margin-bottom: 28px; text-align: center; }
        .sidebar .photo img { width: 96px; height: 96px; border: 3px solid #334155; border-radius: 50%; object-fit: cover; }
        .sidebar .name { margin: 8px 0 0; font-size: 22px; font-weight: 800; color: #f8fafc; }
        .sidebar .designation { font-size: 11px; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; margin-top: 4px; }
        .sidebar .section { margin-bottom: 20px; }
        .sidebar .heading { margin: 0 0 8px; padding-bottom: 4px; border-bottom: 1px solid #334155; color: #94a3b8; font-size: 8px; text-transform: uppercase; letter-spacing: 1px; }
        .sidebar .copy { color: #94a3b8; font-size: .75rem; }
        .sidebar .contact p { margin: 0 0 6px; }
        .sidebar .contact b { color: #f8fafc; }
        .main { margin-left: 280px; padding: 36px 40px; background: #fff; }
        .main .section { margin-bottom: 26px; }
        .main .heading { margin: 0 0 8px; padding-bottom: 4px; border-bottom: 2px solid #cbd5e1; color: #0f172a; font-size: 8px; letter-spacing: 1.5px; text-transform: uppercase; }
        .main .copy { color: #64748b; }
        .main .contact p { margin: 0 0 8px; }
        .main .contact b, .main .meta { color: #1e293b; }
        .main .skills span { display: inline-block; margin: 0 8px 5px 0; }
        .main .item { margin-bottom: 12px; }
        .main .item-title { color: #0f172a; font-weight: bold; }
        .main .meta { font-size: .75rem; color: #64748b; }
        .main .education-table { width: 100%; border-collapse: collapse; }
        .main .education-table th, .main .education-table td { padding: 6px 0; vertical-align: top; }
        .main .education-table th { width: 40%; color: #64748b; font-size: .7rem; text-transform: uppercase; letter-spacing: 1px; }
        .main .education-table td { color: #0f172a; }
        .watermark { position: fixed; top: 0; left: 0; width: 794px; height: 1123px; z-index: -1; }
        .watermark span { display: block; width: 794px; height: 1123px; padding-top: 619px; color: #0f172a; font-size: 77px; font-weight: bold; line-height: 1.039; text-align: center; white-space: nowrap; transform: rotate(-30deg); }
    </style>
</head>
<body>
    <div class="watermark"><span>{{ $watermarkText ?? trim(($cv['name'] ?? '').' CV') }}</span></div>
    <div class="sidebar">
        @if (!empty($cv['photo']) && str_starts_with($cv['photo'], 'data:image/'))<div class="photo"><img src="{{ $cv['photo'] }}" alt="Profile photo"></div>@endif
        <div class="name">{{ $cv['name'] ?? 'Your Name' }}</div>
        <div class="designation">{{ $cv['headline'] ?? 'Professional title' }}</div>
        <section class="section contact"><h2 class="heading">Contact</h2>@foreach ([['Phone', 'phone'], ['Email', 'email'], ['Location', 'location'], ['Website', 'website'], ['LinkedIn', 'linkedin'], ['GitHub', 'github']] as [$label, $key]) @if (!empty($cv[$key]))<p><b>{{ $label }}:</b> {{ $cv[$key] }}</p>@endif @endforeach</section>
        @if (!empty($cv['languages']))<section class="section"><h2 class="heading">Languages</h2>@foreach ($cv['languages'] as $language) @if (!empty($language['name']))<p class="copy"><strong>{{ $language['name'] }}</strong><br>{{ $language['level'] ?? '' }}</p>@endif @endforeach</section>@endif
        @if (!empty($cv['certifications']))<section class="section"><h2 class="heading">Certificates</h2>@foreach ($cv['certifications'] as $certification) @if (!empty($certification['name']))<div class="item"><div class="item-title">{{ $certification['name'] }}</div><div class="meta">{{ $certification['organization'] ?? '' }} · {{ $certification['date'] ?? '' }}</div></div>@endif @endforeach</section>@endif
    </div>
    <div class="main">
        <section class="section"><h2 class="heading">Summary</h2><p class="copy">{{ $cv['summary'] ?? 'Your professional summary will appear here.' }}</p></section>
        <section class="section"><h2 class="heading">Education</h2>
            @foreach ($cv['education'] ?? [] as $education)
                @if (!empty($education['degree']) || !empty($education['institution']))
                    <table class="education-table">
                        <tbody>
                            <tr><th>Degree</th><td>{{ $education['degree'] ?? 'Degree name' }}{{ !empty($education['field']) ? ' / '.$education['field'] : '' }}</td></tr>
                            <tr><th>Institution</th><td>{{ $education['institution'] ?? '' }}</td></tr>
                            @if (!empty($education['startYear']) || !empty($education['endYear']))
                                <tr><th>Period</th><td>{{ $education['startYear'] ?? '' }} – {{ $education['endYear'] ?? '' }}</td></tr>
                            @endif
                            @if (!empty($education['totalMarks']) || !empty($education['obtainedMarks']) || !empty($education['percentage']))
                                <tr><th>Marks</th><td>@if (!empty($education['obtainedMarks']))Obtained: {{ $education['obtainedMarks'] }} · @endif @if (!empty($education['totalMarks']))Total: {{ $education['totalMarks'] }} · @endif @if (!empty($education['percentage']))Percentage: {{ $education['percentage'] }}@endif</td></tr>
                            @endif
                            @if (!empty($education['description']))<tr><td></td><td class="copy">{{ $education['description'] }}</td></tr>@endif
                        </tbody>
                    </table>
                @endif
            @endforeach
            @if (empty(array_filter($cv['education'] ?? [], fn ($item) => !empty($item['degree']) || !empty($item['institution']))))<p class="copy">Your education history will appear here.</p>@endif
        </section>
        <section class="section"><h2 class="heading">Experience</h2>@foreach ($cv['experience'] ?? [] as $experience) @if (!empty($experience['position']) || !empty($experience['company']))<div class="item"><div class="item-title">{{ $experience['position'] ?? 'Job position' }}</div><div class="meta">{{ $experience['company'] ?? '' }} · {{ $experience['startDate'] ?? '' }} – {{ !empty($experience['current']) ? 'Present' : ($experience['endDate'] ?? '') }}</div><div class="copy">{{ $experience['description'] ?? '' }}</div></div>@endif @endforeach</section>
        @if (!empty($cv['projects']))<section class="section"><h2 class="heading">Projects</h2>@foreach ($cv['projects'] as $project) @if (!empty($project['name']))<div class="item"><div class="item-title">{{ $project['name'] }}</div><div class="meta">{{ $project['role'] ?? '' }}{{ !empty($project['technologies']) ? ' / '.$project['technologies'] : '' }}</div>@if (!empty($project['description']))<div class="copy">{{ $project['description'] }}</div>@endif</div>@endforeach</section>@endif
        @if (!empty($cv['skills']))<section class="section"><h2 class="heading">Skills</h2><div class="skills">@foreach (array_filter(array_map('trim', explode(',', $cv['skills']))) as $skill)<span><b>✓</b> {{ $skill }}</span>@endforeach</div></section>@endif
        @if (!empty($cv['awards']))<section class="section"><h2 class="heading">Awards</h2><div>@foreach ($cv['awards'] as $award) <div>{{ $award }}</div>@endforeach</div></section>@endif
    </div>
    <footer style="clear: both; height: 24px; background: #1e293b; margin-top: 24px; width: 100%;"></footer>
</body>
</html>