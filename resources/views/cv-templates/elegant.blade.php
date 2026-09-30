<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $cv['name'] ?? 'Professional CV' }}</title>
    <style>
        @page { size: A4; margin: 0; }
        * { box-sizing: border-box; }
        body { margin: 0; color: #3f3f46; font: 10px/1.6 DejaVu Serif, Georgia, serif; }
        .frame { padding: 16px; }
        .sheet { padding: 30px 34px 34px; border: 1px solid #c9a227; }
        .head { padding-bottom: 22px; border-bottom: 2px solid #1f2937; text-align: center; }
        .photo img { width: 92px; height: 92px; border-radius: 50%; border: 2px solid #c9a227; object-fit: cover; }
        .title { margin-top: 12px; color: #a1801a; font-family: DejaVu Sans, Arial, sans-serif; font-size: 8px; letter-spacing: 3.4px; text-transform: uppercase; }
        .name { margin: 9px 0 0; color: #111827; font-size: 30px; font-weight: bold; letter-spacing: .5px; }
        .contact-line { margin-top: 14px; color: #52525b; font-family: DejaVu Sans, Arial, sans-serif; font-size: 8.5px; }
        .contact-line span { margin: 0 14px 0 0; }
        .body { padding-top: 22px; }
        .section { margin-bottom: 20px; }
        .heading { margin: 0 0 10px; color: #1f2937; font-family: DejaVu Sans, Arial, sans-serif; font-size: 8.5px; font-weight: bold; letter-spacing: 3px; text-transform: uppercase; }
        .heading span { color: #c9a227; }
        .rule { margin: 0 0 9px; border-top: 1px solid #e7e5e4; }
        .summary { margin: 0; color: #3f3f46; font-style: italic; }
        .item { margin-bottom: 13px; padding-left: 14px; border-left: 2px solid #e7e5e4; }
        .item:last-child { margin-bottom: 0; }
        .item-title { color: #111827; font-size: 11px; font-weight: bold; }
        .meta { margin-top: 1px; color: #a1801a; font-family: DejaVu Sans, Arial, sans-serif; font-size: 8.5px; }
        .copy { margin: 4px 0 0; color: #52525b; }
        .skills span { display: inline-block; margin: 0 8px 6px 0; padding: 3px 10px; border: 1px solid #c9a227; color: #78350f; font-family: DejaVu Sans, Arial, sans-serif; font-size: 8.5px; }
        .details { display: table; width: 100%; }
        .detail-cell { display: table-cell; width: 33.33%; vertical-align: top; padding-right: 12px; }
        .footer { padding: 14px 34px; text-align: center; color: #a1801a; font-family: DejaVu Sans, Arial, sans-serif; font-size: 7px; letter-spacing: 2.4px; text-transform: uppercase; }
        .watermark { position: fixed; top: 0; left: 0; width: 794px; height: 1123px; z-index: -1; }
        .watermark span { display: block; width: 794px; height: 1123px; padding-top: 619px; color: #ece9e2; font-size: {{ $watermarkSize ?? 77 }}px; font-weight: bold; line-height: 1.039; text-align: center; white-space: nowrap; transform: rotate(-30deg); }
    </style>
</head>
<body>
    <div class="watermark"><span>{{ $watermarkText ?? trim(($cv['name'] ?? '').' CV') }}</span></div>
    <div class="frame"><div class="sheet">
        <header class="head">
            @if (!empty($cv['photo']) && str_starts_with($cv['photo'], 'data:image/'))<div class="photo"><img src="{{ $cv['photo'] }}" alt="Profile photo"></div>@endif
            <div class="title">{{ $cv['headline'] ?? 'Professional title' }}</div>
            <h1 class="name">{{ $cv['name'] ?? 'Your Name' }}</h1>
            <div class="contact-line">@foreach ([['Phone', 'phone'], ['Email', 'email'], ['Location', 'location'], ['Website', 'website'], ['LinkedIn', 'linkedin']] as [$label, $key]) @if (!empty($cv[$key]))<span>{{ $cv[$key] }}</span>@endif @endforeach @if (empty($cv['phone']) && empty($cv['email']) && empty($cv['location']) && empty($cv['website']) && empty($cv['linkedin']))<span>Add your contact details</span>@endif</div>
        </header>
        <div class="body">
            <section class="section"><h2 class="heading"><span>&#9670;</span>&nbsp; Profile</h2><div class="rule"></div><p class="summary">{{ $cv['summary'] ?? 'Your professional summary will appear here.' }}</p></section>
            <section class="section"><h2 class="heading"><span>&#9670;</span>&nbsp; Education</h2><div class="rule"></div>
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
            <section class="section"><h2 class="heading"><span>&#9670;</span>&nbsp; Experience</h2><div class="rule"></div>
                @foreach ($cv['experience'] ?? [] as $experience)
                    @if (!empty($experience['position']) || !empty($experience['company']))<div class="item"><div class="item-title">{{ $experience['position'] ?? 'Job position' }}</div><div class="meta">{{ $experience['company'] ?? '' }} · {{ $experience['startDate'] ?? '' }} – {{ !empty($experience['current']) ? 'Present' : ($experience['endDate'] ?? '') }}</div>@if (!empty($experience['description']))<p class="copy">{{ $experience['description'] }}</p>@endif</div>@endif
                @endforeach
                @if (empty(array_filter($cv['experience'] ?? [], fn ($item) => !empty($item['position']) || !empty($item['company']))))<p class="copy">Your work experience will appear here.</p>@endif
            </section>
            @if (!empty($cv['skills']))<section class="section"><h2 class="heading"><span>&#9670;</span>&nbsp; Skills</h2><div class="rule"></div><div class="skills">@foreach (array_filter(array_map('trim', explode(',', $cv['skills']))) as $skill)<span>{{ $skill }}</span>@endforeach</div></section>@endif
            @if (!empty($cv['languages']) || !empty($cv['certifications']))<section class="section"><h2 class="heading"><span>&#9670;</span>&nbsp; Languages &amp; Certifications</h2><div class="rule"></div><div class="details">
                <div class="detail-cell">@if (!empty($cv['languages']))@foreach ($cv['languages'] as $language) @if (!empty($language['name']))<p class="copy"><b>{{ $language['name'] }}</b> · {{ $language['level'] ?? '' }}</p>@endif @endforeach @else<p class="copy">Add your languages.</p>@endif</div>
                <div class="detail-cell">@if (!empty($cv['certifications']))@foreach ($cv['certifications'] as $certification) @if (!empty($certification['name']))<p class="copy"><b>{{ $certification['name'] }}</b> · {{ $certification['organization'] ?? '' }} {{ $certification['date'] ?? '' }}</p>@endif @endforeach @else<p class="copy">Add your certifications.</p>@endif</div>
            </div></section>@endif
            @if (!empty($cv['fullAddress']) || !empty($cv['fatherName']) || !empty($cv['domicile']) || !empty($cv['dateOfBirth']) || !empty($cv['cnicNumber']))<section class="section"><h2 class="heading"><span>&#9670;</span>&nbsp; Personal details</h2><div class="rule"></div><div class="details">
                <div class="detail-cell">@if (!empty($cv['fullAddress']))<p class="copy"><b>Address:</b> {{ $cv['fullAddress'] }}</p>@endif @if (!empty($cv['fatherName']))<p class="copy"><b>Father name:</b> {{ $cv['fatherName'] }}</p>@endif</div>
                <div class="detail-cell">@if (!empty($cv['domicile']))<p class="copy"><b>Domicile:</b> {{ $cv['domicile'] }}</p>@endif @if (!empty($cv['dateOfBirth']))<p class="copy"><b>Date of birth:</b> {{ $cv['dateOfBirth'] }}</p>@endif</div>
                <div class="detail-cell">@if (!empty($cv['cnicNumber']))<p class="copy"><b>CNIC / ID:</b> {{ $cv['cnicNumber'] }}</p>@endif</div>
            </div></section>@endif
        </div>
    </div>
    <div class="footer">{{ $cv['name'] ?? 'Your Name' }} &nbsp;&bull;&nbsp; Curriculum Vitae</div></div>
</body>
</html>