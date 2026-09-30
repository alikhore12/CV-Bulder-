<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $cv['name'] ?? 'Professional CV' }}</title>
    <style>
        @page { size: A4; margin: 0; }
        * { box-sizing: border-box; }
        body { margin: 0; color: #3a3a3a; font: 10px/1.65 Georgia, 'DejaVu Serif', serif; }
        .head { padding: 44px 48px 20px; text-align: center; }
        .photo img { width: 78px; height: 78px; border-radius: 50%; object-fit: cover; }
        .title { margin-top: 10px; color: #78716c; font-family: DejaVu Sans, Arial, sans-serif; font-size: 8px; letter-spacing: 3px; text-transform: uppercase; }
        .name { margin: 8px 0 0; color: #18181b; font-size: 27px; font-weight: normal; letter-spacing: 1px; }
        .rule { width: 54px; margin: 14px auto 0; border-top: 1px solid #a8a29e; }
        .contact-line { margin-top: 13px; color: #57534e; font-family: DejaVu Sans, Arial, sans-serif; font-size: 9px; }
        .contact-line span { margin: 0 11px 0 0; }
        .body { padding: 6px 48px 40px; }
        .section { margin-bottom: 21px; }
        .heading { margin: 0 0 10px; padding-bottom: 5px; border-bottom: 1px solid #d6d3d1; color: #18181b; font-family: DejaVu Sans, Arial, sans-serif; font-size: 8px; font-weight: bold; letter-spacing: 2.8px; text-transform: uppercase; }
        .copy { margin: 0; color: #57534e; }
        .summary { margin: 0; color: #44403c; }
        .item { margin-bottom: 12px; }
        .item:last-child { margin-bottom: 0; }
        .item-title { color: #18181b; font-size: 11px; }
        .meta { margin-top: 1px; color: #78716c; font-family: DejaVu Sans, Arial, sans-serif; font-size: 8.5px; }
        .skills span { display: inline-block; margin: 0 14px 5px 0; color: #292524; }
        .grid { display: table; width: 100%; }
        .cell { display: table-cell; width: 50%; vertical-align: top; padding-right: 18px; }
        .cell:last-child { padding-right: 0; padding-left: 18px; }
        .footer { height: 3px; margin: 0 48px 20px; background: #a8a29e; }
        .watermark { position: fixed; top: 0; left: 0; width: 794px; height: 1123px; z-index: -1; }
        .watermark span { display: block; width: 794px; height: 1123px; padding-top: 619px; color: #eceae7; font-size: {{ $watermarkSize ?? 77 }}px; font-weight: bold; line-height: 1.039; text-align: center; white-space: nowrap; transform: rotate(-30deg); }
    </style>
</head>
<body>
    <div class="watermark"><span>{{ $watermarkText ?? trim(($cv['name'] ?? '').' CV') }}</span></div>
    <header class="head">
        @if (!empty($cv['photo']) && str_starts_with($cv['photo'], 'data:image/'))<div class="photo"><img src="{{ $cv['photo'] }}" alt="Profile photo"></div>@endif
        <div class="title">{{ $cv['headline'] ?? 'Professional title' }}</div>
        <h1 class="name">{{ $cv['name'] ?? 'Your Name' }}</h1>
        <div class="rule"></div>
        <div class="contact-line">@foreach ([['Phone', 'phone'], ['Email', 'email'], ['Location', 'location'], ['Website', 'website'], ['LinkedIn', 'linkedin']] as [$label, $key]) @if (!empty($cv[$key]))<span>{{ $cv[$key] }}</span>@endif @endforeach @if (empty($cv['phone']) && empty($cv['email']) && empty($cv['location']) && empty($cv['website']) && empty($cv['linkedin']))<span>Add your contact details</span>@endif</div>
    </header>
    <div class="body">
        <section class="section"><h2 class="heading">Profile</h2><p class="summary">{{ $cv['summary'] ?? 'Your professional summary will appear here.' }}</p></section>
        <section class="section"><h2 class="heading">Education</h2>
            @foreach ($cv['education'] ?? [] as $education)
                @if (!empty($education['degree']) || !empty($education['institution']))
                    <div class="item"><div class="item-title">{{ $education['degree'] ?? 'Degree name' }}{{ !empty($education['field']) ? ' / '.$education['field'] : '' }}</div>
                        <div class="meta">{{ $education['institution'] ?? '' }}{{ !empty($education['startYear']) || !empty($education['endYear']) ? ' · '.($education['startYear'] ?? '').' – '.($education['endYear'] ?? '') : '' }}{{ !empty($education['totalMarks']) || !empty($education['obtainedMarks']) || !empty($education['percentage']) ? ' · '.(!empty($education['obtainedMarks']) ? 'Obtained: '.$education['obtainedMarks'].' ' : '').(!empty($education['totalMarks']) ? '/ Total: '.$education['totalMarks'].' ' : '').(!empty($education['percentage']) ? '/ Percentage: '.$education['percentage'] : '') : '' }}</div>
                        @if (!empty($education['description']))<p class="copy">{{ $education['description'] }}</p>@endif
                    </div>
                @endif
            @endforeach
            @if (empty(array_filter($cv['education'] ?? [], fn ($item) => !empty($item['degree']) || !empty($item['institution']))))<p class="copy">Your education history will appear here.</p>@endif
        </section>
        <section class="section"><h2 class="heading">Experience</h2>
            @foreach ($cv['experience'] ?? [] as $experience)
                @if (!empty($experience['position']) || !empty($experience['company']))<div class="item"><div class="item-title">{{ $experience['position'] ?? 'Job position' }}</div><div class="meta">{{ $experience['company'] ?? '' }} · {{ $experience['startDate'] ?? '' }} – {{ !empty($experience['current']) ? 'Present' : ($experience['endDate'] ?? '') }}</div>@if (!empty($experience['description']))<p class="copy">{{ $experience['description'] }}</p>@endif</div>@endif
            @endforeach
            @if (empty(array_filter($cv['experience'] ?? [], fn ($item) => !empty($item['position']) || !empty($item['company']))))<p class="copy">Your work experience will appear here.</p>@endif
        </section>
        <section class="section"><div class="grid">
            <div class="cell">@if (!empty($cv['skills']))<h2 class="heading">Skills</h2><div class="skills">@foreach (array_filter(array_map('trim', explode(',', $cv['skills']))) as $skill)<span>{{ $skill }}</span>@endforeach</div>@endif</div>
            <div class="cell">@if (!empty($cv['languages']))<h2 class="heading">Languages</h2>@foreach ($cv['languages'] as $language) @if (!empty($language['name']))<p class="copy"><b>{{ $language['name'] }}</b> · {{ $language['level'] ?? '' }}</p>@endif @endforeach @elseif (!empty($cv['certifications']))<h2 class="heading">Certifications</h2>@foreach ($cv['certifications'] as $certification) @if (!empty($certification['name']))<p class="copy"><b>{{ $certification['name'] }}</b> · {{ $certification['organization'] ?? '' }} {{ $certification['date'] ?? '' }}</p>@endif @endforeach @else<h2 class="heading">Skills</h2><p class="copy">Add your strengths.</p>@endif</div>
        </div></section>
        @if (!empty($cv['certifications']) && !empty($cv['languages']))<section class="section"><h2 class="heading">Certifications</h2>@foreach ($cv['certifications'] as $certification) @if (!empty($certification['name']))<div class="item"><div class="item-title">{{ $certification['name'] }}</div><div class="meta">{{ $certification['organization'] ?? '' }} · {{ $certification['date'] ?? '' }}</div></div>@endif @endforeach</section>@endif
        @if (!empty($cv['fullAddress']) || !empty($cv['fatherName']) || !empty($cv['domicile']) || !empty($cv['dateOfBirth']) || !empty($cv['cnicNumber']))<section class="section"><h2 class="heading">Personal details</h2><div class="copy">@if (!empty($cv['fullAddress']))<p><b>Address:</b> {{ $cv['fullAddress'] }}</p>@endif @if (!empty($cv['fatherName']))<p><b>Father name:</b> {{ $cv['fatherName'] }}</p>@endif @if (!empty($cv['domicile']))<p><b>Domicile:</b> {{ $cv['domicile'] }}</p>@endif @if (!empty($cv['dateOfBirth']))<p><b>Date of birth:</b> {{ $cv['dateOfBirth'] }}</p>@endif @if (!empty($cv['cnicNumber']))<p><b>CNIC / ID:</b> {{ $cv['cnicNumber'] }}</p>@endif</div></section>@endif
    </div>
    <footer class="footer"></footer>
</body>
</html>