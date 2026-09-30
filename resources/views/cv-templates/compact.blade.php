<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $cv['name'] ?? 'Professional CV' }}</title>
    <style>
        @page { size: A4; margin: 0; }
        * { box-sizing: border-box; }
        body { margin: 0; color: #3f3f46; font: 8.6px/1.45 DejaVu Sans, Arial, sans-serif; }
        .head { padding: 22px 30px 16px; background: #164e63; color: #fff; }
        .identity { display: table; width: 100%; }
        .photo, .head-main { display: table-cell; vertical-align: middle; }
        .photo { width: 78px; }
        .photo img { width: 60px; height: 60px; border: 2px solid #67e8f9; border-radius: 6px; object-fit: cover; }
        .head-main { padding-left: 16px; }
        .title { color: #a5f3fc; font-size: 7.5px; font-weight: bold; letter-spacing: 2px; text-transform: uppercase; }
        .name { margin: 5px 0 0; color: #fff; font-size: 22px; }
        .head-contact { margin-top: 9px; color: #cffafe; font-size: 8px; }
        .head-contact span { margin: 0 13px 0 0; }
        .head-contact b { color: #67e8f9; }
        .body { display: table; width: 100%; padding: 18px 30px 22px; }
        .left, .right { display: table-cell; vertical-align: top; }
        .left { width: 30%; padding-right: 16px; border-right: 1px solid #e2e8f0; }
        .right { width: 70%; padding-left: 18px; }
        .section { margin-bottom: 14px; }
        .heading { margin: 0 0 6px; padding: 0 0 3px 6px; border-bottom: 1px solid #164e63; color: #164e63; font-size: 7.5px; font-weight: bold; letter-spacing: 1.6px; text-transform: uppercase; }
        .copy { margin: 0; color: #52525b; }
        .contact p { margin: 0 0 3px; }
        .contact b, .meta, .tags b { color: #0891b2; }
        .item { margin-bottom: 9px; }
        .item-title { color: #164e63; font-weight: bold; }
        .meta { font-size: 7.8px; font-weight: bold; }
        .tags span { display: inline-block; margin: 0 6px 4px 0; padding: 2px 6px; border: 1px solid #a5f3fc; border-radius: 3px; background: #ecfeff; color: #155e75; font-size: 7.8px; }
        .rows { margin: 0; }
        .rows td { padding: 1px 0; vertical-align: top; }
        .rows td:first-child { padding-right: 8px; color: #71717a; width: 42%; }
        .watermark { position: fixed; top: 0; left: 0; width: 794px; height: 1123px; z-index: -1; }
        .watermark span { display: block; width: 794px; height: 1123px; padding-top: 619px; color: #e0f2f7; font-size: {{ $watermarkSize ?? 77 }}px; font-weight: bold; line-height: 1.039; text-align: center; white-space: nowrap; transform: rotate(-30deg); }
    </style>
</head>
<body>
    <div class="watermark"><span>{{ $watermarkText ?? trim(($cv['name'] ?? '').' CV') }}</span></div>
    <header class="head"><div class="identity">
        @if (!empty($cv['photo']) && str_starts_with($cv['photo'], 'data:image/'))<div class="photo"><img src="{{ $cv['photo'] }}" alt="Profile photo"></div>@endif
        <div class="head-main"><div class="title">{{ $cv['headline'] ?? 'Professional title' }}</div><h1 class="name">{{ $cv['name'] ?? 'Your Name' }}</h1></div>
    </div>
    <div class="head-contact">@foreach ([['Phone', 'phone'], ['Email', 'email'], ['Location', 'location'], ['Website', 'website'], ['LinkedIn', 'linkedin']] as [$label, $key]) @if (!empty($cv[$key]))<span><b>{{ $label }}:</b> {{ $cv[$key] }}</span>@endif @endforeach @if (empty($cv['phone']) && empty($cv['email']) && empty($cv['location']) && empty($cv['website']) && empty($cv['linkedin']))<span>Add your contact details</span>@endif</div>
    </header>
    <div class="body">
        <aside class="left">
            <section class="section"><h2 class="heading">Profile</h2><p class="copy">{{ $cv['summary'] ?? 'Your professional summary will appear here.' }}</p></section>
            <section class="section contact"><h2 class="heading">Contact</h2>@foreach ([['Phone', 'phone'], ['Email', 'email'], ['Location', 'location'], ['Website', 'website'], ['LinkedIn', 'linkedin']] as [$label, $key]) @if (!empty($cv[$key]))<p><b>{{ $label }}:</b> {{ $cv[$key] }}</p>@endif @endforeach</section>
            @if (!empty($cv['skills']))<section class="section"><h2 class="heading">Skills</h2><div class="tags">@foreach (array_filter(array_map('trim', explode(',', $cv['skills']))) as $skill)<span>{{ $skill }}</span>@endforeach</div></section>@endif
            @if (!empty($cv['languages']))<section class="section"><h2 class="heading">Languages</h2>@foreach ($cv['languages'] as $language) @if (!empty($language['name']))<p class="copy"><b style="color:#164e63">{{ $language['name'] }}</b> {{ $language['level'] ?? '' }}</p>@endif @endforeach</section>@endif
            @if (!empty($cv['fullAddress']) || !empty($cv['fatherName']) || !empty($cv['domicile']) || !empty($cv['dateOfBirth']) || !empty($cv['cnicNumber']))<section class="section"><h2 class="heading">Personal details</h2><table class="rows">
                @if (!empty($cv['fullAddress']))<tr><td>Address</td><td>{{ $cv['fullAddress'] }}</td></tr>@endif
                @if (!empty($cv['fatherName']))<tr><td>Father name</td><td>{{ $cv['fatherName'] }}</td></tr>@endif
                @if (!empty($cv['domicile']))<tr><td>Domicile</td><td>{{ $cv['domicile'] }}</td></tr>@endif
                @if (!empty($cv['dateOfBirth']))<tr><td>Date of birth</td><td>{{ $cv['dateOfBirth'] }}</td></tr>@endif
                @if (!empty($cv['cnicNumber']))<tr><td>CNIC / ID</td><td>{{ $cv['cnicNumber'] }}</td></tr>@endif
            </table></section>@endif
        </aside>
        <main class="right">
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
            <section class="section"><h2 class="heading">Experience</h2>
                @foreach ($cv['experience'] ?? [] as $experience)
                    @if (!empty($experience['position']) || !empty($experience['company']))<div class="item"><div class="item-title">{{ $experience['position'] ?? 'Job position' }}</div><div class="meta">{{ $experience['company'] ?? '' }} · {{ $experience['startDate'] ?? '' }} – {{ !empty($experience['current']) ? 'Present' : ($experience['endDate'] ?? '') }}</div>@if (!empty($experience['description']))<div class="copy">{{ $experience['description'] }}</div>@endif</div>@endif
                @endforeach
                @if (empty(array_filter($cv['experience'] ?? [], fn ($item) => !empty($item['position']) || !empty($item['company']))))<p class="copy">Your work experience will appear here.</p>@endif
            </section>
            @if (!empty($cv['certifications']))<section class="section"><h2 class="heading">Certifications</h2>@foreach ($cv['certifications'] as $certification) @if (!empty($certification['name']))<div class="item"><div class="item-title">{{ $certification['name'] }}</div><div class="meta">{{ $certification['organization'] ?? '' }} · {{ $certification['date'] ?? '' }}</div></div>@endif @endforeach</section>@endif
        </main>
    </div>
</body>
</html>