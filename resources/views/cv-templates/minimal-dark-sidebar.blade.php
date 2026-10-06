<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $cv['name'] ?? 'Professional CV' }}</title>
    <style>
        @page { size: A4 portrait; margin: 0; }
        * { box-sizing: border-box; }
        html, body { width: 210mm; height: 297mm; margin: 0; padding: 0; }
        body { color: #18212b; background: #fff; font: 8pt/1.3 Arial, sans-serif; }
        .page { width: 210mm; height: 297mm; overflow: hidden; }
        .page > .hero { position: absolute; top: 0; right: 0; left: 0; }
        .page > .columns { position: absolute; top: 45mm; right: 0; left: 0; }
        .hero { height: 45mm; padding: 8mm 10mm; background: #222b38; color: #fff; }
        .identity { display: table; width: 100%; }
        .photo-cell, .identity-copy { display: table-cell; vertical-align: middle; }
        .photo-cell { width: 30mm; }
        .photo, .initials { width: 24mm; height: 24mm; border: 2px solid #dce3ea; border-radius: 4px; object-fit: cover; background: #344150; }
        .initials { display: inline-block; padding-top: 7mm; color: #fff; font-size: 16pt; font-weight: bold; text-align: center; }
        .identity-copy { padding-left: 7mm; }
        .title { margin: 0 0 2mm; color: #a9b7c6; font-size: 7pt; letter-spacing: 1.4px; text-transform: uppercase; }
        h1 { margin: 0; font-size: 23pt; line-height: 1; text-transform: uppercase; }
        .columns { display: table; width: 100%; height: 252mm; table-layout: fixed; }
        .main, .sidebar { display: table-cell; vertical-align: top; }
        .main { width: 65%; padding: 8mm 9mm; }
        .sidebar { width: 35%; padding: 8mm 7mm; background: #222b38; color: #e7edf3; }
        .section { margin: 0 0 6mm; page-break-inside: avoid; }
        .heading { margin: 0 0 2.5mm; padding-bottom: 1.5mm; border-bottom: 1px solid #cbd5df; color: #26384a; font-size: 7pt; letter-spacing: 1.2px; text-transform: uppercase; }
        .sidebar .heading { border-color: #526273; color: #fff; }
        p { margin: 0; }
        .summary, .copy { color: #586777; }
        .item { margin-bottom: 3.5mm; padding-bottom: 2.5mm; border-bottom: 1px dotted #c9d0d7; }
        .item:last-child { border-bottom: 0; }
        .item-title { color: #1d3347; font-size: 9pt; font-weight: bold; }
        .meta { margin-top: 1mm; color: #64788a; font-size: 7pt; }
        .copy { margin-top: 1mm; white-space: pre-line; }
        .skill { display: inline-block; margin: 0 1mm 1.5mm 0; padding: 1mm 2mm; border-radius: 2px; background: #eef2f5; color: #425466; font-size: 7pt; }
        .contact p { margin-bottom: 2.5mm; overflow-wrap: anywhere; color: #dce4eb; }
        .side-item { margin-bottom: 3.5mm; }
        .side-copy { color: #c5d0da; font-size: 7pt; }
    </style>
</head>
<body>
<div class="page">
    <header class="hero"><div class="identity"><div class="photo-cell">
        @if (!empty($cv['photo'])) <img src="{{ $cv['photo'] }}" alt="Profile photo" class="photo"> @else <span class="initials">{{ collect(explode(' ', trim($cv['name'] ?? 'YN')))->map(fn ($word) => substr($word, 0, 1))->join('') }}</span> @endif
    </div><div class="identity-copy"><p class="title">{{ $cv['headline'] ?? 'Professional title' }}</p><h1>{{ $cv['name'] ?? 'Your Name' }}</h1></div></div></header>
    <div class="columns">
        <main class="main">
            @if (!empty($cv['summary']))<section class="section"><h2 class="heading">Profile</h2><p class="summary">{{ $cv['summary'] }}</p></section>@endif
            @if (collect($cv['experience'] ?? [])->contains(fn ($item) => !empty($item['position']) || !empty($item['company'])))<section class="section"><h2 class="heading">Experience</h2>@foreach ($cv['experience'] ?? [] as $item) @if (!empty($item['position']) || !empty($item['company']))<div class="item"><p class="item-title">{{ $item['position'] ?? '' }}</p><p class="meta">{{ implode(' · ', array_filter([$item['company'] ?? '', $item['location'] ?? '', $item['startDate'] ?? '', !empty($item['current']) ? 'Present' : ($item['endDate'] ?? '')])) }}</p>@if (!empty($item['description']))<p class="copy">{{ $item['description'] }}</p>@endif</div>@endif @endforeach</section>@endif
            @if (collect($cv['education'] ?? [])->contains(fn ($item) => !empty($item['degree']) || !empty($item['institution'])))<section class="section"><h2 class="heading">Education</h2>@foreach ($cv['education'] ?? [] as $item) @if (!empty($item['degree']) || !empty($item['institution']))<div class="item"><p class="item-title">{{ $item['degree'] ?? '' }}{{ !empty($item['field']) ? ' / '.$item['field'] : '' }}</p><p class="meta">{{ implode(' · ', array_filter([$item['institution'] ?? '', $item['location'] ?? '', $item['startYear'] ?? '', $item['endYear'] ?? ''])) }}</p>@if (!empty($item['obtainedMarks']) || !empty($item['totalMarks']) || !empty($item['percentage']))<p class="copy">Marks: {{ implode(' · ', array_filter([$item['obtainedMarks'] ?? '', $item['totalMarks'] ?? '', $item['percentage'] ?? ''])) }}</p>@endif @if (!empty($item['description']))<p class="copy">{{ $item['description'] }}</p>@endif</div>@endif @endforeach</section>@endif
            @if (!empty($cv['projects']) || !empty($cv['certifications']))<section class="section"><h2 class="heading">Projects & Certifications</h2>@foreach ($cv['projects'] ?? [] as $item) @if (!empty($item['name']))<div class="item"><p class="item-title">{{ $item['name'] }}</p><p class="meta">{{ implode(' · ', array_filter([$item['role'] ?? '', $item['technologies'] ?? ''])) }}</p><p class="copy">{{ $item['description'] ?? '' }}</p></div>@endif @endforeach @foreach ($cv['certifications'] ?? [] as $item) @if (!empty($item['name']))<div class="item"><p class="item-title">{{ $item['name'] }}</p><p class="meta">{{ implode(' · ', array_filter([$item['organization'] ?? '', $item['date'] ?? ''])) }}</p></div>@endif @endforeach</section>@endif
        </main>
        <aside class="sidebar">
            <section class="section contact"><h2 class="heading">Contact</h2><p>{{ $cv['email'] ?? '' }}</p><p>{{ $cv['phone'] ?? '' }}</p><p>{{ $cv['location'] ?? '' }}</p><p>{{ $cv['website'] ?? '' }}</p><p>{{ $cv['linkedin'] ?? '' }}</p><p>{{ $cv['github'] ?? '' }}</p></section>
            @if (!empty($cv['skillItems']) || !empty($cv['skills']))<section class="section"><h2 class="heading">Skills</h2>@foreach ($cv['skillItems'] ?? [] as $skill)<span class="skill">{{ $skill['name'] }}</span>@endforeach @if (empty($cv['skillItems']))<p class="side-copy">{{ $cv['skills'] }}</p>@endif</section>@endif
            @if (collect($cv['languages'] ?? [])->contains(fn ($item) => !empty($item['name'])))<section class="section"><h2 class="heading">Languages</h2>@foreach ($cv['languages'] ?? [] as $language) @if (!empty($language['name']))<p class="side-copy"><strong>{{ $language['name'] }}</strong> · {{ $language['proficiency'] ?? $language['level'] ?? '' }}</p>@endif @endforeach</section>@endif
            @if (!empty($cv['fullAddress']) || !empty($cv['nationality']) || !empty($cv['domicile']) || !empty($cv['dateOfBirth']) || !empty($cv['cnicNumber']))<section class="section"><h2 class="heading">Details</h2><p class="side-copy">{{ $cv['fullAddress'] ?? '' }}</p><p class="side-copy">{{ implode(' · ', array_filter([$cv['nationality'] ?? '', $cv['domicile'] ?? ''])) }}</p><p class="side-copy">{{ $cv['dateOfBirth'] ?? '' }}</p><p class="side-copy">{{ $cv['cnicNumber'] ?? '' }}</p></section>@endif
            @if (collect($cv['references'] ?? [])->contains(fn ($item) => !empty($item['name'])))<section class="section"><h2 class="heading">References</h2>@foreach ($cv['references'] ?? [] as $reference) @if (!empty($reference['name']))<p class="side-copy"><strong>{{ $reference['name'] }}</strong><br>{{ implode(' · ', array_filter([$reference['position'] ?? '', $reference['company'] ?? '', $reference['email'] ?? '', $reference['phone'] ?? ''])) }}</p>@endif @endforeach</section>@endif
        </aside>
    </div>
</div>
</body>
</html>
