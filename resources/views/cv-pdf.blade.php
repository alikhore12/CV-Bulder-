<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $cv['name'] ?? 'Professional CV' }}</title>
    <style>
        @page { size: A4; margin: 0; }
        * { box-sizing: border-box; }
        body { margin: 0; color: #475569; font: 10px/1.55 DejaVu Sans, Arial, sans-serif; }
        .header { height: 165px; position: relative; overflow: hidden; padding: 35px 42px; background: #0a2c4f; color: #fff; }
        .shape { position: absolute; right: -8%; top: -50%; width: 32%; height: 220%; background: #0d6efd; transform: skewX(-28deg); }
        .shape-two { right: 13%; top: auto; bottom: -72%; width: 11%; height: 180%; background: #65a7ff; opacity: .55; }
        .identity { position: relative; z-index: 1; display: table; width: 100%; }
        .photo, .identity-main { display: table-cell; vertical-align: middle; }
        .photo { width: 110px; }
        .photo img { width: 86px; height: 86px; border: 3px solid #fff; border-radius: 50%; object-fit: cover; }
        .title { color: #bfdbfe; font-size: 9px; font-weight: bold; letter-spacing: 2px; text-transform: uppercase; }
        .name { margin: 7px 0 0; color: #fff; font-size: 28px; }
        .body { display: table; width: 100%; padding: 32px 42px; }
        .left, .right { display: table-cell; vertical-align: top; }
        .left { width: 31%; padding-right: 25px; border-right: 1px solid #e2e8f0; }
        .right { padding-left: 28px; }
        .section { margin-bottom: 23px; }
        .heading { margin: 0 0 10px; padding-bottom: 5px; border-bottom: 2px solid #0d6efd; color: #0d6efd; font-size: 9px; letter-spacing: 2px; text-transform: uppercase; }
        .copy { color: #64748b; }
        .contact p { margin: 0 0 7px; }
        .contact b, .meta, .skills b { color: #0d6efd; }
        .item { margin-bottom: 14px; }
        .item-title { color: #0a2c4f; font-weight: bold; }
        .meta { font-size: 9px; font-weight: bold; }
        .skills span { display: inline-block; margin: 0 12px 7px 0; }
        .footer { height: 20px; background: #0a2c4f; }
        .watermark { position: fixed; top: 0; left: 0; width: 794px; height: 1123px; z-index: -1; }
        .watermark span { display: block; width: 794px; height: 1123px; padding-top: 619px; color: #dde5ef; font-size: {{ $watermarkSize ?? 77 }}px; font-weight: bold; line-height: 1.039; text-align: center; white-space: nowrap; transform: rotate(-30deg); }
    </style>
</style><style>.left section:nth-child(3) { display: none; }</style></head>
<body>
    <div class="watermark"><span>{{ $watermarkText ?? trim(($cv['name'] ?? '').' CV') }}</span></div>
    <header class="header"><div class="shape"></div><div class="shape shape-two"></div><div class="identity">
        @if (!empty($cv['photo']) && str_starts_with($cv['photo'], 'data:image/'))<div class="photo"><img src="{{ $cv['photo'] }}" alt="Profile photo"></div>@endif
        <div class="identity-main"><div class="title">{{ $cv['headline'] ?? 'Professional title' }}</div><h1 class="name">{{ $cv['name'] ?? 'Your Name' }}</h1></div>
    </div></header>
    <div class="body">
        <aside class="left">
            <section class="section"><h2 class="heading">Profile</h2><p class="copy">{{ $cv['summary'] ?? 'Your professional summary will appear here.' }}</p></section>
            <section class="section contact"><h2 class="heading">Contact</h2>@foreach ([['Phone', 'phone'], ['Email', 'email'], ['Location', 'location'], ['Website', 'website'], ['LinkedIn', 'linkedin']] as [$label, $key]) @if (!empty($cv[$key]))<p><b>{{ $label }}:</b> {{ $cv[$key] }}</p>@endif @endforeach</section>
            @if (!empty($cv['skills']))<section class="section"><h2 class="heading">Skills</h2><div class="skills">@foreach (array_filter(array_map('trim', explode(',', $cv['skills']))) as $skill)<span><b>✓</b> {{ $skill }}</span>@endforeach</div></section>@endif
            @if (!empty($cv['languages']))<section class="section"><h2 class="heading">Languages</h2>@foreach ($cv['languages'] as $language) @if (!empty($language['name']))<p class="copy"><strong>{{ $language['name'] }}</strong><br>{{ $language['level'] ?? '' }}</p>@endif @endforeach</section>@endif
            @if (!empty($cv['fullAddress']) || !empty($cv['fatherName']) || !empty($cv['domicile']) || !empty($cv['dateOfBirth']) || !empty($cv['cnicNumber']))<section class="section"><h2 class="heading">Personal details</h2>@if (!empty($cv['fullAddress']))<p class="copy"><strong>Address:</strong> {{ $cv['fullAddress'] }}</p>@endif @if (!empty($cv['fatherName']))<p class="copy"><strong>Father name:</strong> {{ $cv['fatherName'] }}</p>@endif @if (!empty($cv['domicile']))<p class="copy"><strong>Domicile:</strong> {{ $cv['domicile'] }}</p>@endif @if (!empty($cv['dateOfBirth']))<p class="copy"><strong>Date of birth:</strong> {{ $cv['dateOfBirth'] }}</p>@endif @if (!empty($cv['cnicNumber']))<p class="copy"><strong>CNIC / ID:</strong> {{ $cv['cnicNumber'] }}</p>@endif</section>@endif
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
            </section>
            <section class="section"><h2 class="heading">Experience</h2>@foreach ($cv['experience'] ?? [] as $experience) @if (!empty($experience['position']) || !empty($experience['company']))<div class="item"><div class="item-title">{{ $experience['position'] ?? 'Job position' }}</div><div class="meta">{{ $experience['company'] ?? '' }} · {{ $experience['startDate'] ?? '' }} – {{ !empty($experience['current']) ? 'Present' : ($experience['endDate'] ?? '') }}</div><div class="copy">{{ $experience['description'] ?? '' }}</div></div>@endif @endforeach</section>
            @if (!empty($cv['certifications']))<section class="section"><h2 class="heading">Certifications</h2>@foreach ($cv['certifications'] as $certification) @if (!empty($certification['name']))<div class="item"><div class="item-title">{{ $certification['name'] }}</div><div class="meta">{{ $certification['organization'] ?? '' }} · {{ $certification['date'] ?? '' }}</div></div>@endif @endforeach</section>@endif
            @if (!empty($cv['skills']))<section class="section"><h2 class="heading">Skills</h2><div class="skills">@foreach (array_filter(array_map('trim', explode(',', $cv['skills']))) as $skill)<span><b>✓</b> {{ $skill }}</span>@endforeach</div></section>@endif
        </main>
    </div><footer class="footer"></footer>
</body>
</html>
