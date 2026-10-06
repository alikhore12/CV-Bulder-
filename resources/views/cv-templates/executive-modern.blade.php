<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $cv['name'] ?? 'Professional CV' }}</title>
    <style>
        @page { size: A4; margin: 0; }
        * { box-sizing: border-box; }
        body { margin: 0; color: #f8fafc; font: 10px/1.55 system-ui, -apple-system, Segoe UI, Roboto, sans-serif; background: #1e293b; }
        .header { padding: 40px 36px; background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%); position: relative; }
        .header .accent-line { width: 100%; height: 3px; background: #3b82f6; position: absolute; bottom: 0; left: 0; }
        .identity { position: relative; z-index: 1; display: table; width: 100%; }
        .photo, .identity-main { display: table-cell; vertical-align: middle; }
        .photo { width: 130px; }
        .photo img { width: 104px; height: 104px; border: 4px solid #3b82f6; border-radius: 50%; object-fit: cover; box-shadow: 0 0 0 2px #0f172a, 0 8px 24px rgba(0,0,0,.4); }
        .identity-main { padding-left: 32px; }
        .title { color: #94a3b8; font-size: 8px; font-weight: bold; letter-spacing: 2px; text-transform: uppercase; }
        .name { margin: 6px 0 0; color: #f8fafc; font-size: 30px; font-weight: 800; }
        .body { padding: 36px 36px; }
        .section { margin-bottom: 28px; }
        .heading { margin: 0 0 8x; padding-bottom: 4px; border-bottom: 1px solid #334155; color: #64748b; font-size: 8px; letter-spacing: 1.5px; text-transform: uppercase; }
        .copy { color: #94a3b8; }
        .card { background: #0f172a; border-radius: 12px; padding: 20px; margin-bottom: 20px; }
        .card .heading { color: #64748b; font-size: 8px; margin-bottom: 6px; border-bottom: 1px solid #334155; padding-bottom: 4px; }
        .card .item-title { color: #f8fafc; font-weight: bold; }
        .card .meta { color: #64748b; font-size: .75rem; }
        .tag { display: inline-block; margin: 0 4px 4px 0; padding: 2px 6px; background: #3b82f6; color: #fff; border-radius: 4px; font-size: .65rem; text-transform: uppercase; letter-spacing: 1px; }
        .watermark { position: fixed; top: 0; left: 0; width: 794px; height: 1123px; z-index: -1; }
        .watermark span { display: block; width: 794px; height: 1123px; padding-top: 619px; color: #0f172a; font-size: 77px; font-weight: bold; line-height: 1.039; text-align: center; white-space: nowrap; transform: rotate(-30deg); }
    </style>
</head>
<body>
    <div class="watermark"><span>{{ $watermarkText ?? trim(($cv['name'] ?? '').' CV') }}</span></div>
    <header class="header"><div class="accent-line"></div><div class="identity">
        @if (!empty($cv['photo']) && str_starts_with($cv['photo'], 'data:image/'))<div class="photo"><img src="{{ $cv['photo'] }}" alt="Profile photo"></div>@endif
        <div class="identity-main"><div class="title">{{ $cv['headline'] ?? 'Professional title' }}</div><h1 class="name">{{ $cv['name'] ?? 'Your Name' }}</h1></div>
    </div></header>
    <div class="body">
        @if (!empty($cv['projects']))<section class="section"><h2 class="heading">Projects</h2>@foreach ($cv['projects'] as $project) @if (!empty($project['name']))<div class="card"><div class="heading">Project</div><div class="item-title">{{ $project['name'] }}</div><div class="meta">{{ $project['role'] ?? '' }}{{ !empty($project['technologies']) ? ' / '.$project['technologies'] : '' }}</div>@if (!empty($project['description']))<div class="copy">{{ $project['description'] }}</div>@endif</div>@endforeach</section>@endif
        <section class="section"><div class="card"><h3 class="heading">Professional Summary</h3><p class="copy">{{ $cv['summary'] ?? 'Your professional summary will appear here.' }}</p></div></section>
        @foreach ($cv['experience'] as $item)
            @if (!empty($item['position']) || !empty($item['company']))
                <section class="section"><div class="card"><h3 class="heading">Experience</h3>
                    <div class="item"><div class="item-title">{{ $item['position'] ?? 'Job position' }}</div><div class="meta">{{ $item['company'] ?? '' }} · {{ $item['startDate'] ?? '' }} – {{ !empty($item['current']) ? 'Present' : ($item['endDate'] ?? '') }}</div><div class="copy">{{ $item['description'] ?? '' }}</div></div>
                </section>
            @endif
        @endforeach
        @foreach ($cv['education'] as $item)
            @if (!empty($item['degree']) || !empty($item['institution']))
                <section class="section"><div class="card"><h3 class="heading">Education</h3>
                    <div class="item"><div class="item-title">{{ $item['degree'] ?? 'Degree name' }}{{ !empty($item['field']) ? ' / '.$item['field'] : '' }}</div>
                        <div class="meta">{{ $item['institution'] ?? '' }}{{ !empty($item['startYear']) || !empty($item['endYear']) ? ' · '.($item['startYear'] ?? '').' – '.($item['endYear'] ?? '') : '' }}</div>
                        @if (!empty($item['totalMarks']) || !empty($item['obtainedMarks']) || !empty($item['percentage']))<div class="meta">@if (!empty($item['obtainedMarks']))Obtained: {{ $item['obtainedMarks'] }} · @endif @if (!empty($item['totalMarks']))Total: {{ $item['totalMarks'] }} · @endif @if (!empty($item['percentage']))Percentage: {{ $item['percentage'] }}@endif</div>@endif
                        @if (!empty($item['description']))<div class="copy">{{ $item['description'] }}</div>@endif
                    </div>
                </section>
            @endif
        @endforeach
        @if (!empty($cv['skills']))<section class="section"><h2 class="heading">Skills</h2><div>@foreach (array_filter(array_map('trim', explode(',', $cv['skills']))) as $skill)<span class="tag">{{ ucfirst($skill) }}</span>@endforeach</div></section>@endif
        @if (!empty($cv['certifications']))<section class="section"><h2 class="heading">Certifications</h2>@foreach ($cv['certifications'] as $item) @if (!empty($item['name']))<div class="card"><div class="item-title">{{ $item['name'] }}</div><div class="meta">{{ $item['organization'] ?? '' }} · {{ $item['date'] ?? '' }}</div></div>@endforeach</section>@endif
        @if (!empty($cv['languages']))<section class="section"><h2 class="heading">Languages</h2>@foreach ($cv['languages'] as $language) @if (!empty($language['name']))<p class="copy"><strong>{{ $language['name'] }}</strong> · {{ $language['level'] ?? '' }}</p>@endif @endforeach</section>@endif
        @if (!empty($cv['awards']))<section class="section"><h2 class="heading">Awards</h2><div>@foreach ($cv['awards'] as $award) <div>{{ $award }}</div>@endforeach</div></section>@endif
    </div>
</body>
</html>