<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $cv['name'] ?? 'Professional CV' }}</title>
    <style>
        @page { size: A4 portrait; margin: 0; }
        * { box-sizing: border-box; }
        html, body { width: 210mm; height: 297mm; margin: 0; padding: 0; }
        body { color: #172b36; background: #fff; font: 8pt/1.3 Arial, sans-serif; }
        .page { position: relative; width: 210mm; height: 297mm; overflow: hidden; }
        .page > .header { position: absolute; top: 0; right: 0; left: 0; }
        .page > .columns { position: absolute; top: 48mm; right: 0; left: 0; }
        .header { position: relative; height: 48mm; padding: 7mm 10mm; overflow: hidden; color: #fff; background: #073f56; }
        .shape { position: absolute; border-radius: 50%; opacity: .22; background: #6bd3ef; }
        .shape.one { top: -35mm; left: 30mm; width: 110mm; height: 65mm; }
        .shape.two { top: -23mm; right: -30mm; width: 100mm; height: 58mm; background: #fff; opacity: .18; }
        .identity { position: relative; z-index: 1; display: table; width: 100%; }
        .photo-cell, .identity-copy { display: table-cell; vertical-align: middle; }
        .photo-cell { width: 31mm; }
        .photo, .initials { width: 24mm; height: 24mm; border: 2px solid #fff; border-radius: 50%; object-fit: cover; background: #0d536c; }
        .initials { display: inline-block; padding-top: 7mm; color: #fff; font-size: 16pt; font-weight: bold; text-align: center; }
        .identity-copy { padding-left: 6mm; }
        .title { margin: 0 0 2mm; color: #9bdff0; font-size: 7pt; letter-spacing: 1.4px; text-transform: uppercase; }
        h1 { margin: 0; font-size: 23pt; line-height: 1; text-transform: uppercase; }
        .columns { display: table; width: 100%; height: 249mm; table-layout: fixed; }
        .main, .sidebar { display: table-cell; vertical-align: top; }
        .main { width: 68%; padding: 8mm 9mm; }
        .sidebar { width: 32%; padding: 8mm 7mm; color: #eaf5f8; background: #0b465d; }
        .section { margin: 0 0 6mm; page-break-inside: avoid; }
        .heading { margin: 0 0 2.5mm; padding-bottom: 1.5mm; border-bottom: 1px solid #b9cdd5; color: #073f56; font-size: 7pt; letter-spacing: 1.2px; text-transform: uppercase; }
        .sidebar .heading { border-color: #4f7787; color: #fff; }
        p { margin: 0; }
        .summary, .copy { color: #526b76; }
        .item { margin-bottom: 3.5mm; padding-bottom: 2.5mm; border-bottom: 1px dotted #c6d2d7; }
        .item:last-child { border-bottom: 0; }
        .item-title { color: #073f56; font-size: 9pt; font-weight: bold; }
        .meta { margin-top: 1mm; color: #5f7b86; font-size: 7pt; }
        .copy { margin-top: 1mm; white-space: pre-line; }
        .contact p { margin-bottom: 2.5mm; overflow-wrap: anywhere; color: #e4f1f4; }
        .skill { display: inline-block; margin: 0 1mm 1.5mm 0; padding: 1mm 2mm; border: 1px solid #75c8dc; border-radius: 10px; color: #fff; font-size: 7pt; }
        .language { margin-bottom: 2.5mm; color: #e4f1f4; }
        .language strong { color: #fff; }
        .side-copy { color: #d0e2e7; font-size: 7pt; }
        .bar { height: 1.2mm; margin-top: 1mm; background: #477888; }
        .bar-fill { width: 70%; height: 100%; background: #8de0f0; }
    </style>
</head>
<body>
<div class="page">
    <header class="header"><span class="shape one"></span><span class="shape two"></span><div class="identity"><div class="photo-cell">
        @if (!empty($cv['photo'])) <img src="{{ $cv['photo'] }}" alt="Profile photo" class="photo"> @else <span class="initials">{{ collect(explode(' ', trim($cv['name'] ?? 'YN')))->map(fn ($word) => substr($word, 0, 1))->join('') }}</span> @endif
    </div><div class="identity-copy"><p class="title">{{ $cv['headline'] ?? 'Professional title' }}</p><h1>{{ $cv['name'] ?? 'Your Name' }}</h1></div></div></header>
    <div class="columns">
        <main class="main">
            @if (!empty($cv['summary']))<section class="section"><h2 class="heading">Profile</h2><p class="summary">{{ $cv['summary'] }}</p></section>@endif
            @if (collect($cv['experience'] ?? [])->contains(fn ($item) => !empty($item['position']) || !empty($item['company'])))<section class="section"><h2 class="heading">Experience</h2>@foreach ($cv['experience'] ?? [] as $item) @if (!empty($item['position']) || !empty($item['company']))<div class="item"><p class="item-title">{{ $item['position'] ?? '' }}</p><p class="meta">{{ implode(' · ', array_filter([$item['company'] ?? '', $item['location'] ?? '', $item['startDate'] ?? '', !empty($item['current']) ? 'Present' : ($item['endDate'] ?? '')])) }}</p>@if (!empty($item['description']))<p class="copy">{{ $item['description'] }}</p>@endif</div>@endif @endforeach</section>@endif
            @if (collect($cv['education'] ?? [])->contains(fn ($item) => !empty($item['degree']) || !empty($item['institution'])))<section class="section"><h2 class="heading">Education</h2>@foreach ($cv['education'] ?? [] as $item) @if (!empty($item['degree']) || !empty($item['institution']))<div class="item"><p class="item-title">{{ $item['degree'] ?? '' }}{{ !empty($item['field']) ? ' / '.$item['field'] : '' }}</p><p class="meta">{{ implode(' · ', array_filter([$item['institution'] ?? '', $item['location'] ?? '', $item['startYear'] ?? '', $item['endYear'] ?? ''])) }}</p>@if (!empty($item['obtainedMarks']) || !empty($item['totalMarks']) || !empty($item['percentage']))<p class="copy">Marks: {{ implode(' · ', array_filter([$item['obtainedMarks'] ?? '', $item['totalMarks'] ?? '', $item['percentage'] ?? ''])) }}</p>@endif @if (!empty($item['description']))<p class="copy">{{ $item['description'] }}</p>@endif</div>@endif @endforeach</section>@endif
            @if (!empty($cv['projects']) || !empty($cv['certifications']))<section class="section"><h2 class="heading">Projects & Certifications</h2>@foreach ($cv['projects'] ?? [] as $item) @if (!empty($item['name']))<div class="item"><p class="item-title">{{ $item['name'] }}</p><p class="meta">{{ implode(' · ', array_filter([$item['role'] ?? '', $item['technologies'] ?? ''])) }}</p><p class="copy">{{ $item['description'] ?? '' }}</p></div>@endif @endforeach @foreach ($cv['certifications'] ?? [] as $item) @if (!empty($item['name']))<div class="item"><p class="item-title">{{ $item['name'] }}</p><p class="meta">{{ implode(' · ', array_filter([$item['organization'] ?? '', $item['issueDate'] ?? ($item['date'] ?? '')])) }}</p></div>@endif @endforeach</section>@endif
        </main>
        <aside class="sidebar">
            <section class="section contact"><h2 class="heading">Contact</h2><p>{{ $cv['email'] ?? '' }}</p><p>{{ $cv['phone'] ?? '' }}</p><p>{{ $cv['location'] ?? '' }}</p><p>{{ $cv['website'] ?? '' }}</p><p>{{ $cv['linkedin'] ?? '' }}</p><p>{{ $cv['github'] ?? '' }}</p></section>
            @if (!empty($cv['skillItems']) || !empty($cv['skills']))<section class="section"><h2 class="heading">Skills</h2>@foreach ($cv['skillItems'] ?? [] as $skill)<span class="skill">{{ $skill['name'] }}</span>@endforeach @if (empty($cv['skillItems']))<p class="side-copy">{{ $cv['skills'] }}</p>@endif</section>@endif
            @if (collect($cv['languages'] ?? [])->contains(fn ($item) => !empty($item['name'])))<section class="section"><h2 class="heading">Languages</h2>@foreach ($cv['languages'] ?? [] as $language) @if (!empty($language['name']))<div class="language"><strong>{{ $language['name'] }}</strong> · {{ $language['proficiency'] ?? $language['level'] ?? '' }}<div class="bar"><div class="bar-fill"></div></div></div>@endif @endforeach</section>@endif
            @if (!empty($cv['fullAddress']) || !empty($cv['nationality']) || !empty($cv['domicile']) || !empty($cv['dateOfBirth']) || !empty($cv['cnicNumber']))<section class="section"><h2 class="heading">Details</h2><p class="side-copy">{{ $cv['fullAddress'] ?? '' }}</p><p class="side-copy">{{ implode(' · ', array_filter([$cv['nationality'] ?? '', $cv['domicile'] ?? ''])) }}</p><p class="side-copy">{{ $cv['dateOfBirth'] ?? '' }}</p><p class="side-copy">{{ $cv['cnicNumber'] ?? '' }}</p></section>@endif
            @if (collect($cv['references'] ?? [])->contains(fn ($item) => !empty($item['name'])))<section class="section"><h2 class="heading">References</h2>@foreach ($cv['references'] ?? [] as $reference) @if (!empty($reference['name']))<p class="side-copy"><strong>{{ $reference['name'] }}</strong><br>{{ implode(' · ', array_filter([$reference['position'] ?? '', $reference['company'] ?? '', $reference['email'] ?? '', $reference['phone'] ?? ''])) }}</p>@endif @endforeach</section>@endif
        </aside>
    </div>
</div>
</body>
</html>
