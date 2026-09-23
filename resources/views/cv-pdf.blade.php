<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $cv['name'] ?? 'CVCraft AI CV' }}</title>
    <style>
        @page { size: A4; margin: 18mm; }
        * { box-sizing: border-box; }
        body { margin: 0; color: #334155; font-family: DejaVu Sans, Arial, sans-serif; font-size: 10px; line-height: 1.5; }
        .top { border-bottom: 3px solid {{ $cv['color'] }}; padding-bottom: 13px; }
        .identity { display: table; width: 100%; }
        .identity-main, .identity-photo { display: table-cell; vertical-align: top; }
        .identity-photo { width: 110px; text-align: right; }
        .identity-photo img { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; }
        h1 { margin: 0; color: #0f172a; font-size: 24px; line-height: 1.2; }
        .title { display: inline-block; margin-top: 6px; padding: 5px 9px; border-radius: 5px; background: {{ $cv['color'] }}; color: #fff; font-size: 11px; font-weight: bold; }
        .contact { margin-top: 10px; color: #64748b; }
        .section { margin-top: 16px; }
        .section-title { display: inline-block; margin: 0 0 7px; padding: 4px 7px; border-radius: 4px; background: {{ $cv['color'] }}; color: #fff; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; }
        p { margin: 0; }
        .meta { margin: 3px 0; color: {{ $cv['color'] }}; }
        table { width: 100%; border-collapse: collapse; font-size: 9px; }
        th { background: {{ $cv['color'] }}; color: #fff; text-align: left; }
        th, td { border: 1px solid #cbd5e1; padding: 6px; vertical-align: top; }
        .skills span { display: inline-block; margin: 2px 3px 2px 0; padding: 3px 6px; border-radius: 3px; background: {{ $cv['color'] }}22; color: {{ $cv['color'] }}; }
        .detail { margin: 2px 0; }
        .detail strong { color: #0f172a; }
    </style>
</head>
<body>
    <header class="top"><div class="identity"><div class="identity-main"><h1>{{ $cv['name'] ?? 'Your Name' }}</h1><div class="title">{{ $cv['headline'] ?? 'Your Professional Title' }}</div><div class="contact">{{ implode('  |  ', array_filter([$cv['email'] ?? null, $cv['phone'] ?? null, $cv['location'] ?? null])) }}</div></div>@if (! empty($cv['photo']) && str_starts_with($cv['photo'], 'data:image/'))<div class="identity-photo"><img src="{{ $cv['photo'] }}" alt="Profile photo"></div>@endif</div></header>
    @if (! empty($cv['otherInformation']) || ! empty($cv['fatherName']) || ! empty($cv['domicile']) || ! empty($cv['dateOfBirth']) || ! empty($cv['cnicNumber']) || ! empty($cv['fullAddress']) )<section class="section"><h2 class="section-title">Other Information</h2>@foreach ([['Father Name', 'fatherName'], ['Domicile', 'domicile'], ['Date of Birth', 'dateOfBirth'], ['CNIC Number', 'cnicNumber'], ['Full Address', 'fullAddress']] as [$label, $key])@if (! empty($cv[$key]))<p class="detail"><strong>{{ $label }}:</strong> {{ $cv[$key] }}</p>@endif @endforeach @if (! empty($cv['otherInformation']))<p class="detail">{{ $cv['otherInformation'] }}</p>@endif</section>@endif
    <section class="section"><h2 class="section-title">Experience</h2><strong>{{ $cv['jobTitle'] ?? 'Your job title' }}</strong>@if (! empty($cv['company']) || ! empty($cv['startDate']) || ! empty($cv['endDate']))<p class="meta">{{ implode('  ·  ', array_filter([$cv['company'] ?? null, $cv['startDate'] ?? null, $cv['endDate'] ?? null])) }}</p>@endif<p>{{ $cv['experience'] ?? '' }}</p></section>
    @if (! empty($cv['education']))<section class="section"><h2 class="section-title">Education</h2><table><thead><tr><th>Degree</th><th>Current / Obtained</th><th>Total</th><th>Percentage</th><th>Board / University</th></tr></thead><tbody>@foreach ($cv['education'] as $education)<tr><td>{{ $education['degree'] ?? '' }}</td><td>{{ $education['obtainedMarks'] ?? '' }}</td><td>{{ $education['totalMarks'] ?? '' }}</td><td>{{ $education['percentage'] ?? '' }}</td><td>{{ $education['institution'] ?? '' }}</td></tr>@endforeach</tbody></table></section>@endif
    @if (! empty($cv['skills']))<section class="section"><h2 class="section-title">Skills</h2><div class="skills">@foreach (array_filter(array_map('trim', explode(',', $cv['skills']))) as $skill)<span>{{ $skill }}</span>@endforeach</div></section>@endif
</body>
</html>
