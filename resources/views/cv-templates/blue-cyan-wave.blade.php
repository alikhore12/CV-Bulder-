<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $cv['name'] ?? 'Professional CV' }}</title>
    <style>
        @page { size: A4; margin: 0; }
        * { box-sizing: border-box; }
        body { margin: 0; color: #333333; font: 10px/1.55 system-ui, -apple-system, Segoe UI, Roboto, sans-serif; background: #fff; }
        /* Header waves */
        .header { position: relative; padding: 60px 40px 20px; }
        .waves { position: absolute; left: 0; top: 0; right: 0; pointer-events: none; overflow: hidden; height: 250px; }
        .wave-bottom { position: absolute; left: 0; bottom: 0; right: 0; pointer-events: none; overflow: hidden; height: 200px; }
        .c-wave { position: absolute; border-radius: 100% 100% 0 0; opacity: 0.8; }
        .c-wave-1 { width: 60%; height: 50%; background: #19B5E5; top: -20%; left: -10%; transform: skewY(-3deg); }
        .c-wave-2 { width: 50%; height: 40%; background: #26356F; top: -10%; left: 20%; transform: skewY(2deg); }
        .c-wave-3 { position: absolute; width: 100%; height: 100%; background: #26356F; bottom: 0; }
        .c-wave-4 { width: 80%; height: 60%; background: #19B5E5; top: 30%; right: -10%; transform: skewY(4deg); }
        .c-wave-5 { width: 70%; height: 50%; background: #26356F; top: 50%; left: 10%; transform: skewY(-1deg); }
        .c-wave-6 { width: 90%; height: 70%; background: #19B5E5; bottom: -10%; right: 5%; transform: skewY(3deg); }
        /* Profile photo */
        .profile-card { position: relative; text-align: center; margin-bottom: -60px; }
        .profile-img { width: 150px; height: 150px; border: 4px solid #fff; border-radius: 50%; object-fit: cover; box-shadow: 0 10px 30px rgba(0,0,0,.1); }
        .name { color: #26356F; font-size: 32px; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; margin-top: 20px; }
        .designation { color: #19B5E5; font-size: 14px; text-transform: uppercase; letter-spacing: 1px; margin-top: 8px; }
        /* Body */
        .body { padding: 40px; }
        .two-col { display: table; width: 100%; }
        .left-col { display: table-cell; width: 30%; vertical-align: top; padding-right: 30px; }
        .right-col { display: table-cell; width: 70%; vertical-align: top; padding-left: 30px; }
        .section { margin-bottom: 30px; }
        .section-heading { color: #19B5E5; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; border-bottom: 2px solid #26356F; padding-bottom: 8px; margin-bottom: 15px; }
        .contact-item { display: flex; align-items: center; margin-bottom: 10px; }
        .contact-icon { width: 20px; height: 20px; flex-shrink: 0; margin-right: 8px; }
        .contact-icon.phone { background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='%2319B5E5'%3E%3Cpath d='M22 16.92v4a2 2 0 0 1-2.18 2L12 23l-10-4.11a2 2 0 0 1-2.05-1.97L2 19a2 2 0 0 1-.95-1.84l1.55-6.17a2 2 0 0 1 1.73-.6L22 7v-3a2 2 0 0 1 2-2.18 2 2 0 0 1 2.18 2h3zM2.18 6.78A2 2 0 0 1 4.15 4.68l.76 3.45a2 2 0 0 1 1.73.6l1.55 6.17a2 2 0 0 1 1.73.6h12.7l.76 3.45a2 2 0 0 1 1.73.6l-.35 1.55a2 2 0 0 1-1.74.2H4.15l-.53-2.31a2 2 0 0 1-1.66-1.23l-.35-1.55a2 2 0 0 1-1.73-.6L2.18 6.78z'%3E%3C/path%3E%3C/svg%3E ") no-repeat center; }
        .contact-icon.email { background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='%2319B5E5'%3E%3Cpath d='M4 4h16l-5.03 9H5.05l5.03 9H4v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2H4v-2a2 2 0 0 0-2-2zm4.96 3.98l-1.51 5.75a2 2 0 0 0 1.83 1.38h5.94a2 2 0 0 0 1.83-1.38l-1.51-5.75H9.03a2 2 0 0 0-1.83 1.38z'%3E%3C/path%3E%3C/svg%3E ") no-repeat center; }
        .contact-icon.location { background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='%2319B5E5'%3E%3Cpath d='M18 13v6a2 2 0 0 1-2.08 2L12 21l-6-3.98a2 2 0 0 1-1.98-1.85L2 13v-6a2 2 0 0 1 2-2h3zM2 13a2 2 0 0 1 2-2h3v6a2 2 0 0 1-2 2H2z'%3E%3C/path%3E%3C/svg%3E ") no-repeat center; }
        .contact-icon.website { background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='%2319B5E5'%3E%3Cpath d='M5 11l-3.37-3.37a1.99 1.99 0 0 1 1.41-2.83l5.18-5.18a1.99 1.99 0 0 1 2.06 0l5.18 5.18a1.99 1.99 0 0 1-2.06 2.83l-5.18 5.18zm1.18 1.18l-5.05 5.05a1.99 1.99 0 0 1-2.83 0l-5.16-5.16a1.99 1.99 0 0 1 0-2.83l5.16-5.16a1.99 1.99 0 0 1 2.83 0l5.16 5.16z'%3E%3C/path%3E%3C/svg%3E ") no-repeat center; }
        .contact-text { flex: 1; }
        .skill-diamond { display: inline-block; width: 20px; height: 20px; background: #26356F; fold: both; clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%); margin-right: 6px; }
        .award-item { margin-bottom: 15px; }
        .award-title { color: #19B5E5; font-weight: bold; margin-bottom: 4px; }
        .award-institution { color: #666; font-size: 12px; margin-bottom: 2px; }
        .award-year { color: #888; font-size: 11px; }
        /* Right column sections */
.about-me { }
.about-me h3 { color: #19B5E5; text-transform: uppercase; letter-spacing: 1px; border-bottom: 2px solid #26356F; padding-bottom: 8px; margin-bottom: 15px; }
.about-me p { line-height: 1.6; }
.education-entry { margin-bottom: 20px; }
.education-entry .degree { color: #26356F; font-weight: bold; display: block; margin-bottom: 4px; }
.education-entry .institution { color: #555; font-size: 12px; margin-bottom: 2px; }
.education-entry .year { color: #777; font-size: 11px; }
.education-entry .desc { color: #444; font-size: 12px; line-height: 1.4; }
.experience-entry { margin-bottom: 20px; }
.experience-entry .company { color: #26356F; font-weight: bold; margin-bottom: 4px; }
.experience-entry .position { color: #19B5E5; margin-bottom: 4px; }
.experience-entry .year { color: #666; font-size: 12px; }
.experience-entry .desc { color: #444; font-size: 13px; line-height: 1.4; }
.footer-waves { position: relative; padding: 40px 0; margin-top: 60px; }
.footer-waves .wave-bottom { position: absolute; left: 0; bottom: 0; right: 0; }

        /* Keep the downloaded resume on one A4 page. */
        html, body { width: 210mm; height: 297mm; overflow: hidden; }
        .page { position: relative; width: 210mm; height: 297mm; overflow: hidden; }
        .page > .header { position: absolute; top: 0; right: 0; left: 0; }
        .page > .body { position: absolute; top: 55mm; right: 0; left: 0; }
        body { font-size: 8px; line-height: 1.3; }
        .header { height: 55mm; padding: 8mm 10mm 4mm; overflow: hidden; }
        .waves { height: 55mm; }
        .profile-card { margin-bottom: 0; }
        .profile-img { width: 25mm; height: 25mm; }
        .name { margin-top: 3mm; font-size: 18pt; }
        .designation { margin-top: 2mm; font-size: 7pt; }
        .body { height: 242mm; padding: 7mm 10mm; overflow: hidden; }
        .section { margin-bottom: 5mm; page-break-inside: avoid; }
        .section-heading, .about-me h3 { font-size: 7pt; padding-bottom: 2mm; margin-bottom: 4mm; }
        .contact-item { margin-bottom: 4px; }
        .contact-icon { width: 13px; height: 13px; margin-right: 4px; }
        .education-entry, .experience-entry { margin-bottom: 7px; }
        .education-entry .institution, .experience-entry .year, .education-entry .year { font-size: 8px; }
        .education-entry .desc, .experience-entry .desc { font-size: 8px; line-height: 1.3; }
        .footer-waves { display: none; }
    </style>
</head>
<body>
<div class="page">
    <div class="header">
        <div class="waves">
            <div class="c-wave wave-bottom c-wave-1"></div>
            <div class="c-wave c-wave-2"></div>
            <div class="c-wave c-wave-3"></div>
            <div class="c-wave c-wave-4"></div>
            <div class="c-wave c-wave-5"></div>
            <div class="c-wave c-wave-6"></div>
        </div>
        <div class="profile-card">
            <img src="{{ !empty($cv['photo']) ? $cv['photo'] : 'https://via.placeholder.com/150' }}" alt="Profile" class="profile-img">
            <div>
                <h1 class="name">{{ $cv['name'] ?? 'Your Name' }}</h1>
                <p class="designation">{{ $cv['headline'] ?? 'Professional title' }}</p>
            </div>
        </div>
    </div>
    <div class="body">
        <div class="two-col">
            <!-- LEFT COLUMN -->
            <div class="left-col">
                <!-- CONTACTS -->
                <div class="section">
                    <h3 class="section-heading">CONTACTS</h3>
                    <div class="contact-item">
                        <div class="contact-icon phone"></div>
                        <div class="contact-text"><strong>Phone:</strong> {{ $cv['phone'] ?? '' }}</div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon email"></div>
                        <div class="contact-text"><strong>Email:</strong> {{ $cv['email'] ?? '' }}</div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon location"></div>
                        <div class="contact-text"><strong>Location:</strong> {{ $cv['location'] ?? '' }}</div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon website"></div>
                        <div class="contact-text"><strong>Website:</strong> {{ $cv['website'] ?? '' }}</div>
                    </div>
                </div>
                @if (!empty($cv['linkedin']) || !empty($cv['github']) || !empty($cv['fullAddress']) || !empty($cv['nationality']) || !empty($cv['domicile']) || !empty($cv['dateOfBirth']) || !empty($cv['cnicNumber']))
                    <div class="section"><h3 class="section-heading">DETAILS</h3><div class="contact-text">{{ $cv['linkedin'] ?? '' }}<br>{{ $cv['github'] ?? '' }}<br>{{ $cv['fullAddress'] ?? '' }}<br>{{ implode(' · ', array_filter([$cv['nationality'] ?? '', $cv['domicile'] ?? '', $cv['dateOfBirth'] ?? '', $cv['cnicNumber'] ?? ''])) }}</div></div>
                @endif
                @if (!empty($cv['skillItems']) || !empty($cv['skills']))
                    <div class="section">
                        <h3 class="section-heading">SKILLS</h3>
                        @forelse ($cv['skillItems'] ?? [] as $skill)
                            <span class="skill-diamond"></span>{{ $skill['name'] }}<br>
                        @empty
                            {{ $cv['skills'] ?? '' }}
                        @endforelse
                    </div>
                @endif
                @if (collect($cv['certifications'] ?? [])->contains(fn ($item) => !empty($item['name'])))
                    <div class="section">
                        <h3 class="section-heading">CERTIFICATIONS</h3>
                        @foreach ($cv['certifications'] ?? [] as $item)
                            @if (!empty($item['name']))
                                <div class="award-item"><div class="award-title">{{ $item['name'] }}</div><div class="award-institution">{{ $item['organization'] ?? '' }}</div><div class="award-year">{{ $item['issueDate'] ?? ($item['date'] ?? '') }}</div></div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
            <!-- RIGHT COLUMN -->
            <div class="right-col">
                <!-- ABOUT ME -->
                <div class="section about-me">
                    <h3>ABOUT ME</h3>
                    <p>{{ $cv['summary'] ?? '' }}</p>
                </div>
                @if (collect($cv['education'] ?? [])->contains(fn ($item) => !empty($item['degree']) || !empty($item['institution'])))
                    <div class="section"><h3 class="section-heading">EDUCATION</h3>
                        @foreach ($cv['education'] ?? [] as $item)
                            @if (!empty($item['degree']) || !empty($item['institution']))
                                <div class="education-entry"><div class="degree">{{ $item['degree'] ?? '' }}{{ !empty($item['field']) ? ' / '.$item['field'] : '' }}</div><div class="institution">{{ $item['institution'] ?? '' }}{{ !empty($item['location']) ? ' · '.$item['location'] : '' }}</div><div class="year">{{ implode(' - ', array_filter([$item['startYear'] ?? '', $item['endYear'] ?? ''])) }}</div>@if (!empty($item['obtainedMarks']) || !empty($item['totalMarks']) || !empty($item['percentage']))<div class="desc">Marks: {{ implode(' · ', array_filter([$item['obtainedMarks'] ?? '', $item['totalMarks'] ?? '', $item['percentage'] ?? ''])) }}</div>@endif @if (!empty($item['description']))<div class="desc">{{ $item['description'] }}</div>@endif</div>
                            @endif
                        @endforeach
                    </div>
                @endif
                @if (collect($cv['experience'] ?? [])->contains(fn ($item) => !empty($item['position']) || !empty($item['company'])))
                    <div class="section"><h3 class="section-heading">EXPERIENCE</h3>
                        @foreach ($cv['experience'] ?? [] as $item)
                            @if (!empty($item['position']) || !empty($item['company']))
                                <div class="experience-entry"><div class="company">{{ $item['company'] ?? '' }}</div><div class="position">{{ $item['position'] ?? '' }}</div><div class="year">{{ implode(' - ', array_filter([$item['startDate'] ?? '', !empty($item['current']) ? 'Present' : ($item['endDate'] ?? '')])) }}</div>@if (!empty($item['description']))<div class="desc">{{ $item['description'] }}</div>@endif</div>
                            @endif
                        @endforeach
                    </div>
                @endif
                @if (!empty($cv['projects']))<div class="section"><h3 class="section-heading">PROJECTS</h3>@foreach ($cv['projects'] ?? [] as $item) @if (!empty($item['name']))<div class="experience-entry"><div class="company">{{ $item['name'] }}</div><div class="position">{{ implode(' · ', array_filter([$item['role'] ?? '', $item['technologies'] ?? ''])) }}</div>@if (!empty($item['description']))<div class="desc">{{ $item['description'] }}</div>@endif</div>@endif @endforeach</div>@endif
                @if (collect($cv['languages'] ?? [])->contains(fn ($item) => !empty($item['name'])))<div class="section"><h3 class="section-heading">LANGUAGES</h3>@foreach ($cv['languages'] ?? [] as $language) @if (!empty($language['name']))<div class="experience-entry"><div class="company">{{ $language['name'] }}</div><div class="year">{{ $language['proficiency'] ?? $language['level'] ?? '' }}</div></div>@endif @endforeach</div>@endif
            </div>
        </div>
    </div>
    <footer class="footer-waves">
        <div class="waves">
            <div class="c-wave wave-bottom c-wave-1"></div>
            <div class="c-wave c-wave-2"></div>
            <div class="c-wave c-wave-3"></div>
            <div class="c-wave c-wave-4"></div>
            <div class="c-wave c-wave-5"></div>
            <div class="c-wave c-wave-6"></div>
        </div>
    </footer>
</div>
</body>
</html>
