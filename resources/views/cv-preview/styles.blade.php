<style>
    /* Global A4 Paper Canvas: authentic print proportions, subtle frame and elevation */
    [data-cv-template] .tp-paper {
        position: relative;
        width: 100%;
        max-width: 210mm;
        min-height: 297mm;
        margin: 0 auto;
        background: #ffffff;
        box-shadow: 0 16px 40px -8px rgba(15, 23, 42, 0.18), 0 0 0 1px rgba(15, 23, 42, 0.08);
        border-radius: 4px;
        overflow: hidden;
        transition: all 0.2s ease-in-out;
    }

    /* Common watermark overlay */
    [data-cv-template] .tp-watermark { position:absolute; inset:0; z-index:0; display:flex; align-items:center; justify-content:center; overflow:hidden; pointer-events:none; }
    [data-cv-template] .tp-watermark span { transform:rotate(-30deg); white-space:nowrap; font-size:3.25rem; font-weight:900; letter-spacing:.02em; }

    /* ========================================================
       1. Classic (Blue Professional)
       ======================================================== */
    [data-cv-template="classic"] .tp-watermark span { color: #dde5ef; }
    [data-cv-template="classic"] .tp-header { position: relative; overflow: hidden; background: #0a2c4f; color: #fff; padding: 28px 36px; }
    [data-cv-template="classic"] .tp-shape { position: absolute; background: var(--cv-accent, #0d6efd); transform: skewX(-28deg); }
    [data-cv-template="classic"] .tp-shape-one { right: -8%; top: -50%; width: 32%; height: 220%; }
    [data-cv-template="classic"] .tp-shape-two { right: 13%; bottom: -72%; width: 11%; height: 180%; background: #65a7ff; opacity: .55; }
    [data-cv-template="classic"] .tp-heading { margin: 0 0 10px; padding-bottom: 5px; border-bottom: 2px solid var(--cv-accent, #0d6efd); color: var(--cv-accent, #0d6efd); font-size: .72rem; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; }
    [data-cv-template="classic"] .tp-copy { color: #64748b; font-size: .72rem; line-height: 1.55; }
    [data-cv-template="classic"] .tp-title { color: #0a2c4f; font-weight: 800; font-size: .82rem; }
    [data-cv-template="classic"] .tp-meta { font-size: .68rem; font-weight: 700; color: var(--cv-accent, #0d6efd); margin-top: 2px; }
    [data-cv-template="classic"] .tp-accent { color: var(--cv-accent, #0d6efd); font-weight: bold; }
    [data-cv-template="classic"] .tp-sidebar { border-right: 1px solid #e2e8f0; }

    /* ========================================================
       2. Modern (Modern Teal & Dynamic Accent)
       ======================================================== */
    [data-cv-template="modern"] .tp-watermark span { color: #dceceb; }
    [data-cv-template="modern"] .tp-accent-bar { height: 6px; background: var(--cv-accent, #0f766e); }
    [data-cv-template="modern"] .tp-card { margin-bottom: 14px; padding: 14px 18px; border: 1px solid #e2e8f0; border-left: 4px solid var(--cv-accent, #0f766e); border-radius: 8px; background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,0.03); }
    [data-cv-template="modern"] .tp-heading { margin: 0 0 8px; color: var(--cv-accent, #0f766e); font-size: .72rem; font-weight: 800; letter-spacing: 2.2px; text-transform: uppercase; }
    [data-cv-template="modern"] .tp-copy { color: #5a6675; font-size: .72rem; line-height: 1.5; }
    [data-cv-template="modern"] .tp-title { color: #134e4a; font-weight: 800; font-size: .82rem; }
    [data-cv-template="modern"] .tp-meta { color: var(--cv-accent, #0f766e); font-size: .68rem; font-weight: 700; margin-top: 2px; }

    /* ========================================================
       3. Minimal (Minimal Serif)
       ======================================================== */
    [data-cv-template="minimal"] .tp-watermark span { color: #eceae7; }
    [data-cv-template="minimal"] .tp-name { font-family: Georgia, 'DejaVu Serif', serif; font-size: 1.85rem; letter-spacing: 1px; color: #18181b; }
    [data-cv-template="minimal"] .tp-rule { width: 50px; margin: 12px auto 14px; border-top: 1px solid #a8a29e; }
    [data-cv-template="minimal"] .tp-heading { font-family: system-ui, sans-serif; font-size: .65rem; font-weight: 800; letter-spacing: 2.8px; text-transform: uppercase; border-bottom: 1px solid #d6d3d1; padding-bottom: 4px; margin-bottom: 8px; color: #18181b; }
    [data-cv-template="minimal"] .tp-summary, [data-cv-template="minimal"] .tp-copy { color: #57534e; font-size: .72rem; line-height: 1.6; }
    [data-cv-template="minimal"] .tp-item-title { color: #18181b; font-size: .82rem; font-weight: 700; }
    [data-cv-template="minimal"] .tp-meta { color: #78716c; font-size: .68rem; }

    /* ========================================================
       4. Elegant (Framed Gold / Accent)
       ======================================================== */
    [data-cv-template="elegant"] .tp-watermark span { color: #ece9e2; }
    [data-cv-template="elegant"] .tp-frame { margin: 12px; padding: 22px 26px; border: 1.5px solid var(--cv-accent, #c9a227); border-radius: 2px; }
    [data-cv-template="elegant"] .tp-header { border-bottom: 2px solid #1f2937; padding-bottom: 16px; text-align: center; }
    [data-cv-template="elegant"] .tp-diamond { color: var(--cv-accent, #c9a227); }
    [data-cv-template="elegant"] .tp-heading { font-size: .72rem; font-weight: 800; letter-spacing: 3px; text-transform: uppercase; color: #1f2937; margin-bottom: 6px; }
    [data-cv-template="elegant"] .tp-rule { border-top: 1px solid #e7e5e4; margin-bottom: 8px; }
    [data-cv-template="elegant"] .tp-item { padding-left: 12px; border-left: 2px solid #e7e5e4; margin-bottom: 10px; }
    [data-cv-template="elegant"] .tp-summary, [data-cv-template="elegant"] .tp-copy { color: #52525b; font-size: .72rem; line-height: 1.55; }
    [data-cv-template="elegant"] .tp-item-title { color: #111827; font-size: .82rem; font-weight: 700; }
    [data-cv-template="elegant"] .tp-meta { color: var(--cv-accent, #a1801a); font-size: .68rem; }
    [data-cv-template="elegant"] .tp-tag { display: inline-block; margin: 0 4px 4px 0; padding: 2.5px 8px; border: 1px solid var(--cv-accent, #c9a227); color: #78350f; font-size: .68rem; border-radius: 2px; }

    /* ========================================================
       5. Compact (Cyan / Two-Column)
       ======================================================== */
    [data-cv-template="compact"] .tp-watermark span { color: #e0f2f7; }
    [data-cv-template="compact"] .tp-header { background: var(--cv-accent, #164e63); color: #fff; padding: 18px 24px; }
    [data-cv-template="compact"] .tp-sidebar { border-right: 1px solid #e2e8f0; padding-right: 14px; }
    [data-cv-template="compact"] .tp-heading { margin: 0 0 6px; padding-bottom: 3px; border-bottom: 1.5px solid var(--cv-accent, #164e63); color: var(--cv-accent, #164e63); font-size: .68rem; font-weight: 800; letter-spacing: 1.6px; text-transform: uppercase; }
    [data-cv-template="compact"] .tp-copy { color: #52525b; font-size: .7rem; line-height: 1.45; }
    [data-cv-template="compact"] .tp-title { color: #164e63; font-weight: 800; font-size: .78rem; }
    [data-cv-template="compact"] .tp-meta { font-size: .68rem; font-weight: 700; color: #0891b2; }
    [data-cv-template="compact"] .tp-tag { display: inline-block; margin: 0 4px 4px 0; padding: 2px 7px; border: 1px solid #a5f3fc; border-radius: 4px; background: #ecfeff; color: #155e75; font-size: .66rem; font-weight: 600; }
    [data-cv-template="compact"] .tp-rows td { padding: 2px 0; font-size: .66rem; }

    /* ========================================================
       6. Blue Cyan Wave
       ======================================================== */
    [data-cv-template="blue-cyan-wave"] .tp-watermark span { color:#cbd5e1; }
    [data-cv-template="blue-cyan-wave"] .tp-shape { position:absolute; background:#19B5E5; opacity:.9; transform:skewX(-6deg); }
    [data-cv-template="blue-cyan-wave"] .tp-shape-one { right:-5%; top:-10%; height:200%; width:30%; }
    [data-cv-template="blue-cyan-wave"] .tp-shape-two { right:5%; bottom:-10%; height:180%; width:15%; background:#26356F; opacity:.5; }
    [data-cv-template="blue-cyan-wave"] .tp-heading { margin-bottom:.8rem; border-bottom:3px solid #26356F; padding-bottom:.4rem; color:#26356F; font-size:.68rem; font-weight:900; letter-spacing:.16em; text-transform:uppercase; }
    [data-cv-template="blue-cyan-wave"] .tp-copy { font-size:.68rem; line-height:1.5; color:#64748b; }
    [data-cv-template="blue-cyan-wave"] .tp-title { font-size:.74rem; font-weight:800; line-height:1.35; color:#222222; }
    [data-cv-template="blue-cyan-wave"] .tp-meta { margin-top:.2rem; font-size:.64rem; font-weight:700; color:#26356F; }
    [data-cv-template="blue-cyan-wave"] .tp-accent { color:#26356F; }
    [data-cv-template="blue-cyan-wave"] .tp-tag { display:inline-block; margin:0 4px 4px 0; padding:2px 8px; background:#19B5E5; color:#fff; border-radius:12px; font-size:.66rem; font-weight:700; }

    /* ========================================================
       7. Black Yellow Sidebar
       ======================================================== */
    [data-cv-template="black-yellow-sidebar"] .tp-watermark span { color:#222222; }
    [data-cv-template="black-yellow-sidebar"] .tp-sidebar { min-width:260px; background:#202020; color:#f3f3f3; padding:36px 22px 24px; }
    [data-cv-template="black-yellow-sidebar"] .tp-sidebar .photo img { width:96px; height:96px; border:3px solid #f4c400; border-radius:50%; }
    [data-cv-template="black-yellow-sidebar"] .tp-sidebar .name { font-size:22px; font-weight:800; color:#fff; margin:8px 0 0; }
    [data-cv-template="black-yellow-sidebar"] .tp-sidebar .designation { font-size:11px; color:#f4c400; text-transform:uppercase; letter-spacing:1px; margin-top:4px; }
    [data-cv-template="black-yellow-sidebar"] .tp-sidebar .heading { margin:0 0 8px; padding-bottom:4px; border-bottom:1px solid #334155; color:#94a3b8; font-size:8px; text-transform:uppercase; letter-spacing:1px; }
    [data-cv-template="black-yellow-sidebar"] .tp-sidebar .copy { color:#94a3b8; font-size:.72rem; }
    [data-cv-template="black-yellow-sidebar"] .tp-sidebar .contact p { margin:0 0 6px; }
    [data-cv-template="black-yellow-sidebar"] .tp-sidebar .contact b { color:#fff; }
    [data-cv-template="black-yellow-sidebar"] .tp-main { padding:32px 36px; background:#fff; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .section { margin-bottom:24px; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .heading { margin:0 0 8px; padding-bottom:4px; border-bottom:2px solid #cbd5e1; color:#0f172a; font-size:8px; letter-spacing:1.5px; text-transform:uppercase; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .copy { color:#64748b; font-size: .72rem; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .contact p { margin:0 0 8px; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .contact b, .tp-main .meta { color:#1e293b; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .skills span { display:inline-block; margin:0 8px 5px 0; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .item { margin-bottom:12px; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .item-title { color:#0f172a; font-weight:bold; }
    [data-cv-template="black-yellow-sidebar"] .tp-main .meta { font-size:.72rem; color:#64748b; }
    [data-cv-template="black-yellow-sidebar"] .tp-education-table { width:100%; border-collapse:collapse; }
    [data-cv-template="black-yellow-sidebar"] .tp-education-table th, .tp-education-table td { padding:6px 0; vertical-align:top; }
    [data-cv-template="black-yellow-sidebar"] .tp-education-table th { width:40%; color:#64748b; font-size:.7rem; text-transform:uppercase; letter-spacing:1px; }
    [data-cv-template="black-yellow-sidebar"] .tp-education-table td { color:#0f172a; }

    /* ========================================================
       8. Minimal Dark Sidebar
       ======================================================== */
    [data-cv-template="minimal-dark-sidebar"] .tp-watermark span { color:#cbd5e1; }
    [data-cv-template="minimal-dark-sidebar"] .tp-name { color:#111111; font-family:system-ui, -apple-system, Segoe UI, Roboto, sans-serif; }
    [data-cv-template="minimal-dark-sidebar"] .tp-rule { width:40px; margin:12px auto 0; border-top:1px solid #e2e8f0; }
    [data-cv-template="minimal-dark-sidebar"] .tp-heading { margin-bottom:.7rem; border-bottom:1px solid #e2e8f0; padding-bottom:.35rem; color:#0f172a; font-size:.62rem; font-weight:700; letter-spacing:.24em; text-transform:uppercase; }
    [data-cv-template="minimal-dark-sidebar"] .tp-summary { margin:0; color:#64748b; font-size:.72rem; line-height:1.5; }
    [data-cv-template="minimal-dark-sidebar"] .tp-item-title { color:#0f172a; font-size:.82rem; font-weight:bold; }
    [data-cv-template="minimal-dark-sidebar"] .tp-meta { margin-top:1px; font-size:.6rem; color:#64748b; }
    [data-cv-template="minimal-dark-sidebar"] .tp-copy { font-size:.68rem; line-height:1.5; color:#64748b; }
    [data-cv-template="minimal-dark-sidebar"] .tp-skills span { display:inline-block; margin:0 6px 5px 0; padding:3px 8px; background:#f1f5f9; border-radius:4px; font-size:.72rem; }
    [data-cv-template="minimal-dark-sidebar"] .tp-grid { display:table; width:100%; }
    [data-cv-template="minimal-dark-sidebar"] .tp-cell { display:table-cell; vertical-align:top; padding-right:24px; }
    [data-cv-template="minimal-dark-sidebar"] .tp-cell:last-child { padding-right:0; }
    [data-cv-template="minimal-dark-sidebar"] .tp-hobbies ul { margin:0; padding:0; list-style:none; }
    [data-cv-template="minimal-dark-sidebar"] .tp-hobbies li { margin:6px 0; }

    /* ========================================================
       9. Navy Blue Geometric
       ======================================================== */
    [data-cv-template="navy-blue-geometric"] .tp-watermark span { color:#0f172a; }
    [data-cv-template="navy-blue-geometric"] .tp-header { padding:36px 32px; background:#0B3447; position:relative; }
    [data-cv-template="navy-blue-geometric"] .tp-header .accent-line { width:100%; height:3px; background:#3b82f6; position:absolute; bottom:0; left:0; }
    [data-cv-template="navy-blue-geometric"] .tp-identity { position:relative; z-index:1; display:table; width:100%; }
    [data-cv-template="navy-blue-geometric"] .tp-photo, .tp-identity-main { display:table-cell; vertical-align:middle; }
    [data-cv-template="navy-blue-geometric"] .tp-photo { width:120px; }
    [data-cv-template="navy-blue-geometric"] .tp-photo img { width:96px; height:96px; border:4px solid #3b82f6; border-radius:50%; object-fit:cover; box-shadow:0 0 0 2px #0f172a, 0 8px 24px rgba(0,0,0,.4); }
    [data-cv-template="navy-blue-geometric"] .tp-identity-main { padding-left:28px; }
    [data-cv-template="navy-blue-geometric"] .tp-title { color:#94a3b8; font-size:8px; font-weight:bold; letter-spacing:2px; text-transform:uppercase; }
    [data-cv-template="navy-blue-geometric"] .tp-name { margin:6px 0 0; color:#fff; font-size:28px; font-weight:800; }
    [data-cv-template="navy-blue-geometric"] .tp-section { margin-bottom:26px; }
    [data-cv-template="navy-blue-geometric"] .tp-heading { margin:0 0 8px; padding-bottom:4px; border-bottom:1px solid #334155; color:#64748b; font-size:8px; letter-spacing:1.5px; text-transform:uppercase; }
    [data-cv-template="navy-blue-geometric"] .tp-copy { color:#94a3b8; }
    [data-cv-template="navy-blue-geometric"] .tp-card { background:#0f172a; border-radius:12px; padding:18px; margin-bottom:18px; }
    [data-cv-template="navy-blue-geometric"] .tp-card .heading { color:#64748b; font-size:8px; margin-bottom:6px; border-bottom:1px solid #334155; padding-bottom:4px; }
    [data-cv-template="navy-blue-geometric"] .tp-card .item-title { color:#fff; font-weight:bold; }
    [data-cv-template="navy-blue-geometric"] .tp-card .meta { color:#64748b; font-size:.72rem; }
    [data-cv-template="navy-blue-geometric"] .tp-tag { display:inline-block; margin:0 4px 4px 0; padding:2px 6px; background:#3b82f6; color:#fff; border-radius:4px; font-size:.65rem; text-transform:uppercase; letter-spacing:1px; }

    /* ========================================================
       10. Royal Blue Tech Sidebar
       ======================================================== */
    [data-cv-template="royal-blue-sidebar"] .tp-watermark span { color: #f1f5f9; }

    /* ========================================================
       11. Creative Purple Designer
       ======================================================== */
    [data-cv-template="creative-purple-wave"] .tp-watermark span { color: #faf5ff; }

    /* ========================================================
       12. Emerald Data Analyst
       ======================================================== */
    [data-cv-template="emerald-data-analyst"] .tp-watermark span { color: #f0fdf4; }

    /* ========================================================
       13. Warm Amber Creative
       ======================================================== */
    [data-cv-template="warm-amber-writer"] .tp-watermark span { color: #fefce8; }

    /* ========================================================
       14. Teal Developer Wave
       ======================================================== */
    [data-cv-template="teal-developer-wave"] .tp-watermark span { color: #f0fdfa; }

    @media print {
        nav, header:not(.tp-header), form, main > div > div:first-child, aside > div:first-child { display:none !important; }
        body, .min-h-screen { background:#fff !important; }
        main, aside { display:block !important; padding:0 !important; }
        [data-cv-template] .tp-paper { width:210mm !important; height:297mm !important; min-height:297mm !important; margin:0 auto !important; overflow:hidden !important; box-shadow:none !important; }
    }
</style>
