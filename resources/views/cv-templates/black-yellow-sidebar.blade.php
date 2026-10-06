<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $cv['name'] ?? 'Professional CV' }}</title>
    <style>
        @page { size: A4 portrait; margin: 0; }
        * { box-sizing: border-box; }
        html, body { width: 210mm; height: 297mm; margin: 0; padding: 0; }
        body { overflow: hidden; color: #242424; background: #fff; font: 8.2pt/1.28 Arial, sans-serif; }
        .page { position: relative; width: 210mm; height: 297mm; overflow: hidden; }
        .page > .top { position: absolute; top: 0; right: 0; left: 0; }
        .page > .layout { position: absolute; top: 58mm; right: 0; left: 0; }
        .top { height: 58mm; padding: 11mm 10mm 8mm 14mm; color: #fff; background: #222; position: relative; }
        .gold-shape { position: absolute; top: -23mm; right: -12mm; width: 68mm; height: 56mm; background: #f4c400; transform: rotate(24deg); }
        .identity { position: relative; z-index: 1; display: table; width: 100%; }
        .identity-photo, .identity-copy { display: table-cell; vertical-align: middle; }
        .identity-photo { width: 35mm; }
        .photo { width: 28mm; height: 28mm; border: 2px solid #fff; border-radius: 50%; object-fit: cover; background: #3a3a3a; }
        .initials { display: inline-block; width: 28mm; height: 28mm; padding-top: 8mm; border: 2px solid #fff; border-radius: 50%; color: #f4c400; background: #3a3a3a; font-size: 18pt; font-weight: bold; text-align: center; }
        .title { margin: 0 0 2mm; color: #f4c400; font-size: 8pt; font-weight: bold; letter-spacing: 1.6px; text-transform: uppercase; }
        h1 { max-width: 120mm; margin: 0; color: #fff; font-size: 25pt; line-height: 1; text-transform: uppercase; }
        .layout { position: absolute; top: 58mm; right: 0; left: 0; display: table; width: 100%; height: 239mm; table-layout: fixed; vertical-align: top; }
        .sidebar, .main { display: table-cell; height: 239mm; vertical-align: top; }
        .sidebar { width: 61mm; height: 239mm; padding: 9mm 7mm; color: #ddd; background: #222; }
        .main { width: 149mm; height: 239mm; padding: 9mm 11mm 6mm; background: #fff; }
        .section { margin: 0 0 6mm; }
        .section:last-child { margin-bottom: 0; }
        .heading { margin: 0 0 2.5mm; padding-bottom: 1.5mm; border-bottom: 1px solid #555; color: #f4c400; font-size: 7.5pt; font-weight: bold; letter-spacing: 1.4px; text-transform: uppercase; }
        .main .heading { border-bottom-color: #d5d5d5; color: #242424; }
        .main .heading:before { content: '✦'; display: inline-block; width: 5mm; height: 5mm; margin-right: 2mm; border-radius: 50%; color: #222; background: #f4c400; font-size: 6pt; line-height: 5mm; text-align: center; }
        p { margin: 0; }
        .muted { color: #666; }
        .sidebar .muted { color: #bbb; }
        .contact p { margin-bottom: 1.6mm; word-wrap: break-word; }
        .gold { color: #f4c400; }
        .side-item { margin-bottom: 3.5mm; }
        .side-item strong { display: block; color: #fff; font-size: 8pt; }
        .side-item small { color: #f4c400; }
        .summary { color: #666; line-height: 1.45; }
        .experience { margin-bottom: 4mm; padding-bottom: 3mm; border-bottom: 1px dotted #ccc; }
        .experience:last-child { border-bottom: 0; }
        .education-entry { margin-bottom: 3.5mm; padding-bottom: 2.5mm; border-bottom: 1px dotted #ccc; }
        .education-entry:last-child { border-bottom: 0; }
        .job { font-size: 9pt; font-weight: bold; text-transform: uppercase; }
        .meta { margin-top: .8mm; color: #bc8500; font-size: 7.5pt; font-weight: bold; }
        .description { margin-top: 1.5mm; color: #666; white-space: pre-line; }
        .skills { display: table; width: 100%; table-layout: fixed; }
        .skill { display: table-cell; width: 50%; padding: 0 5mm 3mm 0; }
        .skill-name { display: block; margin-bottom: 1mm; color: #444; font-weight: bold; }
        .bar { height: 1.5mm; background: #e5e5e5; }
        .fill { height: 100%; background: #f4c400; }
        .small { font-size: 7.5pt; }
    </style>
</head>
<body>
    <div class="page">
        <header class="top"><div class="gold-shape"></div><div class="identity"><div class="identity-photo">
            @if (!empty($cv['photo'])) <img src="{{ $cv['photo'] }}" alt="Profile photo" class="photo"> @else <span class="initials">{{ collect(explode(' ', trim($cv['name'] ?? 'YN')))->map(fn ($word) => substr($word, 0, 1))->join('') }}</span> @endif
        </div><div class="identity-copy"><p class="title">{{ $cv['headline'] ?? 'Professional title' }}</p><h1>{{ $cv['name'] ?? 'Your Name' }}</h1></div></div></header>
        <div class="layout">
            <aside class="sidebar">
                <section class="section contact"><h2 class="heading">Contact me</h2><p x-show="false">&nbsp;</p><p>{{ $cv['phone'] ?? '' }}</p><p>{{ $cv['email'] ?? '' }}</p><p>{{ $cv['location'] ?? '' }}</p><p>{{ $cv['website'] ?? '' }}</p><p>{{ $cv['linkedin'] ?? '' }}</p></section>
                @if (collect($cv['education'] ?? [])->contains(fn ($item) => !empty($item['degree']) || !empty($item['institution'])))
                    <section class="section"><h2 class="heading">Education</h2>@foreach ($cv['education'] ?? [] as $item) @if (!empty($item['degree']) || !empty($item['institution']))<div class="side-item"><strong>{{ $item['degree'] ?? '' }}</strong><small>{{ $item['institution'] ?? '' }}</small><p class="small muted">{{ implode(' – ', array_filter([$item['startYear'] ?? '', $item['endYear'] ?? ''])) }}</p></div>@endif @endforeach</section>
                @endif
                @if (!empty($cv['skills']))
                    <section class="section"><h2 class="heading">Expertise</h2><p class="small">{{ collect($cv['skillItems'] ?? [])->pluck('name')->implode(' · ') ?: $cv['skills'] }}</p></section>
                @endif
                @if (!empty($cv['fullAddress']) || !empty($cv['nationality']) || !empty($cv['domicile']) || !empty($cv['dateOfBirth']) || !empty($cv['cnicNumber']))
                    <section class="section"><h2 class="heading">Personal details</h2><p class="small">{{ $cv['fullAddress'] ?? '' }}</p><p class="small">{{ $cv['nationality'] ?? '' }}{{ !empty($cv['domicile']) ? ' · '.$cv['domicile'] : '' }}</p><p class="small">{{ $cv['dateOfBirth'] ?? '' }}</p><p class="small">{{ $cv['fatherName'] ?? '' }}</p><p class="small">{{ $cv['cnicNumber'] ?? '' }}</p></section>
                @endif
                @if (collect($cv['languages'] ?? [])->contains(fn ($item) => !empty($item['name'])))
                    <section class="section"><h2 class="heading">Languages</h2>@foreach ($cv['languages'] ?? [] as $language) @if (!empty($language['name']))<p class="small"><strong>{{ $language['name'] }}</strong> · {{ $language['proficiency'] ?? $language['level'] ?? '' }}</p>@endif @endforeach</section>
                @endif
                @if (($cv['references'] ?? []) !== [])
                    <section class="section"><h2 class="heading">Reference</h2>@foreach ($cv['references'] as $reference) @if (!empty($reference['name']))<div class="side-item"><strong>{{ $reference['name'] }}</strong><p class="small">{{ implode(' · ', array_filter([$reference['position'] ?? '', $reference['company'] ?? ''])) }}</p><p class="small">{{ implode(' · ', array_filter([$reference['phone'] ?? '', $reference['email'] ?? ''])) }}</p></div>@endif @endforeach</section>
                @endif
            </aside>
            <main class="main">
                @if (!empty($cv['summary']))<section class="section"><h2 class="heading">About me</h2><p class="summary">{{ $cv['summary'] }}</p></section>@endif
                @if (collect($cv['education'] ?? [])->contains(fn ($item) => !empty($item['degree']) || !empty($item['institution'])))<section class="section"><h2 class="heading">Education</h2>@foreach ($cv['education'] ?? [] as $item) @if (!empty($item['degree']) || !empty($item['institution']))<div class="education-entry"><p class="job">{{ $item['degree'] ?? '' }}{{ !empty($item['field']) ? ' — '.$item['field'] : '' }}</p><p class="meta">{{ implode(' · ', array_filter([$item['institution'] ?? '', $item['location'] ?? '', $item['startYear'] ?? '', $item['endYear'] ?? ''])) }}</p>@if (!empty($item['obtainedMarks']) || !empty($item['totalMarks']) || !empty($item['percentage']))<p class="description">Marks: {{ implode(' · ', array_filter([$item['obtainedMarks'] ?? '', $item['totalMarks'] ?? '', $item['percentage'] ?? ''])) }}</p>@endif @if (!empty($item['description']))<p class="description">{{ $item['description'] }}</p>@endif</div>@endif @endforeach</section>@endif
                @if (!empty($cv['experience']))<section class="section"><h2 class="heading">Work experience</h2>@foreach ($cv['experience'] as $item) @if (!empty($item['position']) || !empty($item['company']))<div class="experience"><p class="job">{{ $item['position'] ?? '' }}</p><p class="meta">{{ implode(' · ', array_filter([$item['company'] ?? '', $item['location'] ?? '', $item['startDate'] ?? '', !empty($item['current']) ? 'Present' : ($item['endDate'] ?? '')])) }}</p>@if (!empty($item['description']))<p class="description">{{ $item['description'] }}</p>@endif</div>@endif @endforeach</section>@endif
                @if (!empty($cv['skillItems']))<section class="section"><h2 class="heading">Skills</h2><div class="skills">@foreach ($cv['skillItems'] as $skill)<div class="skill"><span class="skill-name">{{ $skill['name'] }} <span class="muted">{{ $skill['level'] ?? '' }}</span></span><div class="bar"><div class="fill" style="width: {{ match ($skill['level'] ?? '') { 'Expert' => 100, 'Advanced' => 90, 'Professional' => 80, 'Intermediate' => 65, default => 45 } }}%"></div></div></div>@endforeach</div></section>@endif
                @if (!empty($cv['projects']) || !empty($cv['certifications']) || !empty($cv['otherInformation']))<section class="section"><h2 class="heading">Additional</h2>@foreach ($cv['projects'] ?? [] as $item) @if (!empty($item['name']))<p class="job">{{ $item['name'] }}</p><p class="meta">{{ implode(' · ', array_filter([$item['role'] ?? '', $item['technologies'] ?? ''])) }}</p><p class="description">{{ $item['description'] ?? '' }}</p>@if (!empty($item['url']) || !empty($item['githubUrl']))<p class="small muted">{{ implode(' · ', array_filter([$item['url'] ?? '', $item['githubUrl'] ?? ''])) }}</p>@endif @endif @endforeach @foreach ($cv['certifications'] ?? [] as $item) @if (!empty($item['name']))<p class="job">{{ $item['name'] }}</p><p class="meta">{{ implode(' · ', array_filter([$item['organization'] ?? '', $item['date'] ?? '', $item['credentialId'] ?? ''])) }}</p>@endif @endforeach @if (!empty($cv['otherInformation']))<p class="description">{{ $cv['otherInformation'] }}</p>@endif</section>@endif
            </main>
        </div>
    </div>
</body>
</html>
