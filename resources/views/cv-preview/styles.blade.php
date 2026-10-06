<style>
    [data-cv-template] .tp-watermark { position:absolute; inset:0; z-index:0; display:flex; align-items:center; justify-content:center; overflow:hidden; pointer-events:none; }
    [data-cv-template] .tp-watermark span { transform:rotate(-30deg); white-space:nowrap; font-size:3.25rem; font-weight:900; letter-spacing:.02em; }

    [data-cv-template="blue-cyan-wave"] .tp-watermark span { color:#cbd5e1; }
    [data-cv-template="blue-cyan-wave"] .tp-shape { position:absolute; background:#19B5E5; opacity:.9; transform:skewX(-6deg); }
    [data-cv-template="blue-cyan-wave"] .tp-shape-one { right:-5%; top:-10%; height:200%; width:30%; }
    [data-cv-template="blue-cyan-wave"] .tp-shape-two { right:5%; bottom:-10%; height:180%; width:15%; background:#26356F; opacity:.5; }
    [data-cv-template="blue-cyan-wave"] .tp-heading { margin-bottom:.8rem; border-bottom:3px solid #26356F; padding-bottom:.4rem; color:#26356F; font-size:.68rem; font-weight:900; letter-spacing:.16em; text-transform:uppercase; }
    [data-cv-template="blue-cyan-wave"] .tp-copy { font-size:.68rem; line-height:1.5; color:#64748b; }
    [data-cv-template="blue-cyan-wave"] .tp-title { font-size:.74rem; font-weight:800; line-height:1.35; color:#222222; }
    [data-cv-template="blue-cyan-wave"] .tp-meta { margin-top:.2rem; font-size:.64rem; font-weight:700; color:#26356F; }
    [data-cv-template="blue-cyan-wave"] .tp-accent { color:#26356F; }

    [data-cv-template="black-yellow-sidebar"] .tp-watermark span { color:#222222; }
    [data-cv-template="black-yellow-sidebar"] .tp-sidebar { min-width:280px; background:#202020; color:#f3f3f3; padding:40px 25px 24px; }
    [data-cv-template="black-yellow-sidebar"] .tp-sidebar .photo img { width:96px; height:96px; border:3px solid #f4c400; border-radius:50%; }
    [data-cv-template="black-yellow-sidebar"] .tp-sidebar .name { font-size:22px; font-weight:800; color:#fff; margin:8px 0 0; }
    [data-cv-template="black-yellow-sidebar"] .tp-sidebar .designation { font-size:11px; color:#f4c400; text-transform:uppercase; letter-spacing:1px; margin-top:4px; }
    [data-cv-template="black-yellow-sidebar"] .tp-sidebar .heading { margin:0 0 8px; padding-bottom:4px; border-bottom:1px solid #334155; color:#94a3b8; font-size:8px; text-transform:uppercase; letter-spacing:1px; }
    [data-cv-template="black-yellow-sidebar"] .tp-sidebar .copy { color:#94a3b8; font-size:.75rem; }
    [data-cv-template="black-yellow-sidebar"] .tp-sidebar .contact p { margin:0 0 6px; }
    [data-cv-template="black-yellow-sidebar"] .tp-sidebar .contact b { color:#fff; }
    [data-cv-template="black-yellow-sidebar"] .tp-main { margin-left:280px; padding:36px 40px; background:#fff; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .section { margin-bottom:26px; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .heading { margin:0 0 8px; padding-bottom:4px; border-bottom:2px solid #cbd5e1; color:#0f172a; font-size:8px; letter-spacing:1.5px; text-transform:uppercase; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .copy { color:#64748b; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .contact p { margin:0 0 8px; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .contact b, .tp-main .meta { color:#1e293b; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .skills span { display:inline-block; margin:0 8px 5px 0; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .item { margin-bottom:12px; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .item-title { color:#0f172a; font-weight:bold; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .meta { font-size:.75rem; color:#64748b; }
    [data-cv-template="black-yellow-sidebar"] .tp-education-table { width:100%; border-collapse:collapse; }
    [data-cv-template="black-yellow-sidebar"] .tp-education-table th, .tp-education-table td { padding:6px 0; vertical-align:top; }
    [data-cv-template="black-yellow-sidebar"] .tp-education-table th { width:40%; color:#64748b; font-size:.7rem; text-transform:uppercase; letter-spacing:1px; }
    [data-cv-template="black-yellow-sidebar"] .tp-education-table td { color:#0f172a; }

    [data-cv-template="minimal-dark-sidebar"] .tp-watermark span { color:#cbd5e1; }
    [data-cv-template="minimal-dark-sidebar"] .tp-name { color:#111111; font-family:system-ui, -apple-system, Segoe UI, Roboto, sans-serif; }
    [data-cv-template="minimal-dark-sidebar"] .tp-rule { width:40px; margin:12px auto 0; border-top:1px solid #e2e8f0; }
    [data-cv-template="minimal-dark-sidebar"] .tp-heading { margin-bottom:.7rem; border-bottom:1px solid #e2e8f0; padding-bottom:.35rem; color:#0f172a; font-size:.62rem; font-weight:700; letter-spacing:.24em; text-transform:uppercase; }
    [data-cv-template="minimal-dark-sidebar"] .tp-summary { margin:0; color:#64748b; font-size:.72rem; line-height:1.5; }
    [data-cv-template="minimal-dark-sidebar"] .tp-item-title { color:#0f172a; font-size:.87rem; font-weight:bold; }
    [data-cv-template="minimal-dark-sidebar"] .tp-meta { margin-top:1px; font-size:.6rem; color:#64748b; }
    [data-cv-template="minimal-dark-sidebar"] .tp-copy { font-size:.68rem; line-height:1.5; color:#64748b; }
    [data-cv-template="minimal-dark-sidebar"] .tp-skills span { display:inline-block; margin:0 6px 5px 0; padding:3px 8px; background:#f1f5f9; border-radius:4px; font-size:.75rem; }
    [data-cv-template="minimal-dark-sidebar"] .tp-grid { display:table; width:100%; }
    [data-cv-template="minimal-dark-sidebar"] .tp-cell { display:table-cell; vertical-align:top; padding-right:24px; }
    [data-cv-template="minimal-dark-sidebar"] .tp-cell:last-child { padding-right:0; }
    [data-cv-template="minimal-dark-sidebar"] .tp-hobbies ul { margin:0; padding:0; list-style:none; }
    [data-cv-template="minimal-dark-sidebar"] .tp-hobbies li { margin:6px 0; }

    [data-cv-template="navy-blue-geometric"] .tp-watermark span { color:#0f172a; }
    [data-cv-template="navy-blue-geometric"] .tp-header { padding:40px 36px; background:#0B3447; position:relative; }
    [data-cv-template="navy-blue-geometric"] .tp-header .accent-line { width:100%; height:3px; background:#3b82f6; position:absolute; bottom:0; left:0; }
    [data-cv-template="navy-blue-geometric"] .tp-identity { position:relative; z-index:1; display:table; width:100%; }
    [data-cv-template="navy-blue-geometric"] .tp-photo, .tp-identity-main { display:table-cell; vertical-align:middle; }
    [data-cv-template="navy-blue-geometric"] .tp-photo { width:130px; }
    [data-cv-template="navy-blue-geometric"] .tp-photo img { width:104px; height:104px; border:4px solid #3b82f6; border-radius:50%; object-fit:cover; box-shadow:0 0 0 2px #0f172a, 0 8px 24px rgba(0,0,0,.4); }
    [data-cv-template="navy-blue-geometric"] .tp-identity-main { padding-left:32px; }
    [data-cv-template="navy-blue-geometric"] .tp-title { color:#94a3b8; font-size:8px; font-weight:bold; letter-spacing:2px; text-transform:uppercase; }
    [data-cv-template="navy-blue-geometric"] .tp-name { margin:6px 0 0; color:#fff; font-size:30px; font-weight:800; }
    [data-cv-template="navy-blue-geometric"] .tp-section { margin-bottom:28px; }
    [data-cv-template="navy-blue-geometric"] .tp-heading { margin:0 0 8px; padding-bottom:4px; border-bottom:1px solid #334155; color:#64748b; font-size:8px; letter-spacing:1.5px; text-transform:uppercase; }
    [data-cv-template="navy-blue-geometric"] .tp-copy { color:#94a3b8; }
    [data-cv-template="navy-blue-geometric"] .tp-card { background:#0f172a; border-radius:12px; padding:20px; margin-bottom:20px; }
    [data-cv-template="navy-blue-geometric"] .tp-card .heading { color:#64748b; font-size:8px; margin-bottom:6px; border-bottom:1px solid #334155; padding-bottom:4px; }
    [data-cv-template="navy-blue-geometric"] .tp-card .item-title { color:#fff; font-weight:bold; }
    [data-cv-template="navy-blue-geometric"] .tp-card .meta { color:#64748b; font-size:.75rem; }
    [data-cv-template="navy-blue-geometric"] .tp-tag { display:inline-block; margin:0 4px 4px 0; padding:2px 6px; background:#3b82f6; color:#fff; border-radius:4px; font-size:.65rem; text-transform:uppercase; letter-spacing:1px; }

    /* The live result is an A4 sheet, never an endlessly growing page. */
    [data-cv-template] .tp-paper { height:297mm; min-height:297mm; overflow:hidden; }

    @media print {
        nav, header:not(.tp-header), form, main > div > div:first-child, aside > div:first-child { display:none !important; }
        body, .min-h-screen { background:#fff !important; }
        main, aside { display:block !important; padding:0 !important; }
        [data-cv-template] .tp-paper { width:210mm !important; height:297mm !important; min-height:297mm !important; margin:0 auto !important; overflow:hidden !important; box-shadow:none !important; }
    }
</style>
