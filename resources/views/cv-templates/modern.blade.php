<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $cv['name'] ?? 'Professional CV' }}</title>
    <style>
        @page { size: A4; margin: 0; }
        * { box-sizing: border-box; }
        body { margin: 0; color: #3f4a5a; font: 10px/1.6 DejaVu Sans, Arial, sans-serif; }
        .accent-bar { height: 7px; background: #0f766e; }
        .head { padding: 34px 44px 24px; }
        .identity { display: table; width: 100%; }
        .photo, .head-main { display: table-cell; vertical-align: middle; }
        .photo { width: 104px; }
        .photo img { width: 82px; height: 82px; border-radius: 14px; object-fit: cover; }
        .head-main { padding-left: 22px; }
        .title { color: #0f766e; font-size: 9px; font-weight: bold; letter-spacing: 2.4px; text-transform: uppercase; }
        .name { margin: 6px 0 0; color: #134e4a; font-size: 30px; }
        .contact-line { margin-top: 12px; color: #64748b; }
        .contact-line span { margin: 0 16px 0 0; }
        .contact-line b { color: #0f766e; }
        .body { padding: 8px 44px 34px; }
        .card { margin-bottom: 15px; padding: 15px 18px; border: 1px solid #e2e8f0; border-left: 4px solid #0f766e; border-radius: 8px; }
        .heading { margin: 0 0 9px; color: #0f766e; font-size: 9px; letter-spacing: 2.2px; text-transform: uppercase; }
        .copy { color: #5a6675; }
        .summary { margin: 0; color: #475569; font-size: 10px; }
        .item { margin-bottom: 13px; }
        .item:last-child { margin-bottom: 0; }
        .item-title { color: #134e4a; font-weight: bold; }
        .meta { color: #0f766e; font-size: 9px; font-weight: bold; }
        .tags span { display: inline-block; margin: 0 7px 6px 0; padding: 3px 9px; border-radius: 11px; background: #ccfbf1; color: #115e59; font-size: 9px; }
        .pairs p { margin: 0 0 5px; }
        .pairs b { color: #134e4a; }
        .footer { height: 5px; background: #134e4a; }
        .watermark { position: fixed; top: 0; left: 0; width: 794px; height: 1123px; z-index: -1; }
        .watermark span { display: block; width: 794px; height: 1123px; padding-top: 619px; color: #dceceb; font-size: {{ $watermarkSize ?? 77 }}px; font-weight: bold; line-height: 1.039; text-align: center; white-space: nowrap; transform: rotate(-30deg); }
    </style>
</head>
<body>
    <div class="watermark"><span>{{ $watermarkText ?? trim(($cv['name'] ?? '').' CV') }}</span></div>
    <div class="accent-bar"></div>
    <header class="head"><div class="identity">
        @if (!empty($cv['photo']) && str_starts_with($cv['photo'], 'data:image/'))<div class="photo"><img src="{{ $cv['photo'] }}" alt="Profile photo"></div>@endif
        <div class="head-main"><div class="title">{{ $cv['headline'] ?? 'Professional title' }}</div><h1 class="name">{{ $cv['name'] ?? 'Your Name' }}</h1></div>
    </div>
    <div class="contact-line">@foreach ([['Phone', 'phone'], ['Email', 'email'], ['Location', 'location'], ['Website', 'website'], ['LinkedIn', 'linkedin'], ['GitHub', 'github']] as [$label, $key]) @if (!empty($cv[$key]))<span><b>{{ $label }}:</b> {{ $cv[$key] }}</span>@endif @endforeach @if (empty($cv['phone']) && empty($cv['email']) && empty($cv['location']) && empty($cv['website']) && empty($cv['linkedin']) && empty($cv['github']))<span>Add your contact details</span>@endif</div>
    </header>
    <div class="body">
        @if (!empty($cv['projects']))<section class="card"><h2 class="heading">Projects</h2>@foreach ($cv['projects'] as $project) @if (!empty($project['name']))<div class="item"><div class="item-title">{{ $project['name'] }}</div><div class="meta">{{ $project['role'] ?? '' }}{{ !empty($project['technologies']) ? ' / '.$project['technologies'] : '' }}</div>@if (!empty($project['description']))<div class="copy">{{ $project['description'] }}</div>@endif</div>@endif @endforeach</section>@endif
        <section class="card"><h2 class="heading">Profile</h2><p class="summary">{{ $cv['summary'] ?? 'Your professional summary will appear here.' }}</p></section>
        <section class="card"><h2 class="heading">Education</h2>
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
        <section class="card"><h2 class="heading">Experience</h2>
            @foreach ($cv['experience'] ?? [] as $experience)
                @if (!empty($experience['position']) || !empty($experience['company']))<div class="item"><div class="item-title">{{ $experience['position'] ?? 'Job position' }}</div><div class="meta">{{ $experience['company'] ?? '' }} · {{ $experience['startDate'] ?? '' }} – {{ !empty($experience['current']) ? 'Present' : ($experience['endDate'] ?? '') }}</div>@if (!empty($experience['description']))<div class="copy">{{ $experience['description'] }}</div>@endif</div>@endif
            @endforeach
            @if (empty(array_filter($cv['experience'] ?? [], fn ($item) => !empty($item['position']) || !empty($item['company']))))<p class="copy">Your work experience will appear here.</p>@endif
        </section>
        @if (!empty($cv['skills']))<section class="card"><h2 class="heading">Skills</h2><div class="tags">@foreach (array_filter(array_map('trim', explode(',', $cv['skills']))) as $skill)<span>{{ $skill }}</span>@endforeach</div></section>@endif
        @if (!empty($cv['certifications']))<section class="card"><h2 class="heading">Certifications</h2>@foreach ($cv['certifications'] as $certification) @if (!empty($certification['name']))<div class="item"><div class="item-title">{{ $certification['name'] }}</div><div class="meta">{{ $certification['organization'] ?? '' }} · {{ $certification['date'] ?? '' }}</div></div>@endif @endforeach</section>@endif
        @if (!empty($cv['languages']))<section class="card"><h2 class="heading">Languages</h2><div class="pairs">@foreach ($cv['languages'] as $language) @if (!empty($language['name']))<p><b>{{ $language['name'] }}</b> · {{ $language['level'] ?? '' }}</p>@endif @endforeach</div></section>@endif
        @if (!empty($cv['fullAddress']) || !empty($cv['fatherName']) || !empty($cv['domicile']) || !empty($cv['dateOfBirth']) || !empty($cv['cnicNumber']))<section class="card"><h2 class="heading">Personal details</h2><div class="pairs copy">@if (!empty($cv['fullAddress']))<p><b>Address:</b> {{ $cv['fullAddress'] }}</p>@endif @if (!empty($cv['fatherName']))<p><b>Father name:</b> {{ $cv['fatherName'] }}</p>@endif @if (!empty($cv['domicile']))<p><b>Domicile:</b> {{ $cv['domicile'] }}</p>@endif @if (!empty($cv['dateOfBirth']))<p><b>Date of birth:</b> {{ $cv['dateOfBirth'] }}</p>@endif @if (!empty($cv['cnicNumber']))<p><b>CNIC / ID:</b> {{ $cv['cnicNumber'] }}</p>@endif</div></section>@endif
    </div>
    <footer class="footer"></footer>
</body>
</html>
