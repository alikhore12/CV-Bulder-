<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $cv['name'] ?? 'Professional CV' }}</title>
    <style>
        @page { size: A4; margin: 0; }
        * { box-sizing: border-box; }
        body { margin: 0; color: #1e293b; font: 10px/1.55 system-ui, -apple-system, Segoe UI, Roboto, sans-serif; background: #fff; }
        .head { padding: 36px 40px; text-align: center; border-bottom: 1px solid #e2e8f0; }
        .photo { margin: 0 auto 16px; }
        .photo img { width: 90px; height: 90px; border: 3px solid #e2e8f0; border-radius: 50%; object-fit: cover; }
        .title { color: #64748b; font-size: 8px; font-weight: bold; letter-spacing: 2px; text-transform: uppercase; }
        .name { margin: 8px 0 0; color: #1e293b; font-size: 26px; font-weight: 800; }
        .rule { width: 40px; margin: 12px auto 0; border-top: 1px solid #e2e8f0; }
        .body { padding: 32px 40px; }
        .section { margin-bottom: 24px; }
        .heading { margin: 0 0 8px; padding-bottom: 4px; border-bottom: 1px solid #e2e8f0; color: #0f172a; font-size: 8px; letter-spacing: 1.5px; text-transform: uppercase; }
        .copy { color: #64748b; font-size: .81rem; line-height: 1.5; }
        .summary { margin: 0; }
        .item { margin-bottom: 14px; }
        .item:last-child { margin-bottom: 0; }
        .item-title { color: #0f172a; font-weight: bold; font-size: .87rem; }
        .meta { color: #64748b; font-size: .75rem; }
        .skills span { display: inline-block; margin: 0 6px 5px 0; padding: 3px 8px; background: #f1f5f9; border-radius: 4px; font-size: .75rem; }
        .grid { display: table; width: 100%; }
        .cell { display: table-cell; vertical-align: top; padding-right: 24px; }
        .cell:last-child { padding-right: 0; }
        .hobbies ul { margin: 0; padding: 0; list-style: none; }
        .hobbies li { margin: 6px 0; }
        .watermark { position: fixed; top: 0; left: 0; width: 794px; height: 1123px; z-index: -1; }
        .watermark span { display: block; width: 794px; height: 1123px; padding-top: 619px; color: #cbd5e1; font-size: 77px; font-weight: bold; line-height: 1.039; text-align: center; white-space: nowrap; transform: rotate(-30deg); }
    </style>
</head>
<body>
    <div class="watermark"><span>{{ $watermarkText ?? trim(($cv['name'] ?? '').' CV') }}</span></div>
    <header class="head">
        @if (!empty($cv['photo']) && str_starts_with($cv['photo'], 'data:image/'))<div class="photo"><img src="{{ $cv['photo'] }}" alt="Profile photo"></div>@endif
        <div class="title">{{ $cv['headline'] ?? 'Professional title' }}</div>
        <h1 class="name">{{ $cv['name'] ?? 'Your Name' }}</h1>
        <div class="rule"></div>
    </header>
    <div class="body">
        <section class="section"><h2 class="heading">Profile</h2><p class="summary">{{ $cv['summary'] ?? 'Your professional summary will appear here.' }}</p></section>
        <section class="section"><h2 class="heading">Education</h2>
            @foreach ($cv['education'] ?? [] as $education)
                @if (!empty($education['degree']) || !empty($education['institution']))
                    <div class="item"><div class="item-title">{{ $education['degree'] ?? 'Degree name' }}{{ !empty($education['field']) ? ' / '.$education['field'] : '' }}</div>
                        <div class="meta">{{ $education['institution'] ?? '' }}{{ !empty($education['startYear']) || !empty($education['endYear']) ? ' · '.($education['startYear'] ?? '').' – '.($education['endYear'] ?? '') : '' }}</div>
                        @if (!empty($education['totalMarks']) || !empty($education['obtainedMarks']) || !empty($education['percentage']))<div class="meta">@if (!empty($education['obtainedMarks']))Obtained: {{ $education['obtainedMarks'] }} · @endif @if (!empty($education['totalMarks']))Total: {{ $education['totalMarks'] }} · @endif @if (!empty($education['percentage']))Percentage: {{ $education['percentage'] }}@endif</div>@endif
                        @if (!empty($education['description']))<div class="copy">{{ $education['description'] }}</div>@endif
                    </div>
                @endif
            @endforeach
            @if (empty(array_filter($cv['education'] ?? [], fn ($item) => !empty($item['degree']) || !empty($item['institution']))))<p class="copy">Your education history will appear here.</p>@endif
        </section>
        <section class="section"><h2 class="heading">Experience</h2>@foreach ($cv['experience'] ?? [] as $experience) @if (!empty($experience['position']) || !empty($experience['company']))<div class="item"><div class="item-title">{{ $experience['position'] ?? 'Job position' }}</div><div class="meta">{{ $experience['company'] ?? '' }} · {{ $experience['startDate'] ?? '' }} – {{ !empty($experience['current']) ? 'Present' : ($experience['endDate'] ?? '') }}</div><div class="copy">{{ $experience['description'] ?? '' }}</div></div>@endif @endforeach</section>
        <section class="section"><h2 class="heading">Skills</h2><div class="skills">@foreach (array_filter(array_map('trim', explode(',', $cv['skills']))) as $skill)<span>{{ $skill }}</span>@endforeach</div></section>
        <section class="section hobbies"><h2 class="heading">Hobbies</h2><ul>@foreach ($cv['hobbies'] as $hobby) <li>{{ $hobby }}</li>@endforeach</ul></section>
        @if (!empty($cv['certifications']))<section class="section"><h2 class="heading">Certifications</h2>@foreach ($cv['certifications'] as $certification) @if (!empty($certification['name']))<div class="item"><div class="item-title">{{ $certification['name'] }}</div><div class="meta">{{ $certification['organization'] ?? '' }} · {{ $certification['date'] ?? '' }}</div></div>@endif @endforeach</section>@endif
        @if (!empty($cv['fullAddress']) || !empty($cv['fatherName']) || !empty($cv['domicile']) || !empty($cv['dateOfBirth']) || !empty($cv['cnicNumber']))<section class="section"><h2 class="heading">Personal details</h2><div class="copy">@if (!empty($cv['fullAddress']))<p><b>Address:</b> {{ $cv['fullAddress'] }}</p>@endif @if (!empty($cv['fatherName']))<p><b>Father name:</b> {{ $cv['fatherName'] }}</p>@endif @if (!empty($cv['domicile']))<p><b>Domicile:</b> {{ $cv['domicile'] }}</p>@endif @if (!empty($cv['dateOfBirth']))<p><b>Date of birth:</b> {{ $cv['dateOfBirth'] }}</p>@endif @if (!empty($cv['cnicNumber']))<p><b>CNIC / ID:</b> {{ $cv['cnicNumber'] }}</p>@endif</div></section>@endif
    </div>
</body>
</html>