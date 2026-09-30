<style>
    [data-cv-template] .tp-watermark { position:absolute; inset:0; z-index:0; display:flex; align-items:center; justify-content:center; overflow:hidden; pointer-events:none; }
    [data-cv-template] .tp-watermark span { transform:rotate(-30deg); white-space:nowrap; font-size:3.25rem; font-weight:900; letter-spacing:.02em; }

    [data-cv-template="classic"] .tp-watermark span { color:#e2e8f0; }
    [data-cv-template="classic"] .tp-shape { position:absolute; background:#0d6efd; opacity:.9; transform:skewX(-28deg); }
    [data-cv-template="classic"] .tp-shape-one { right:-8%; top:-50%; height:220%; width:32%; }
    [data-cv-template="classic"] .tp-shape-two { right:13%; bottom:-72%; height:180%; width:11%; background:#65a7ff; opacity:.55; }
    [data-cv-template="classic"] .tp-heading { margin-bottom:.8rem; border-bottom:2px solid #0d6efd; padding-bottom:.4rem; color:#0d6efd; font-size:.68rem; font-weight:900; letter-spacing:.16em; text-transform:uppercase; }
    [data-cv-template="classic"] .tp-copy { font-size:.68rem; line-height:1.65; color:#64748b; }
    [data-cv-template="classic"] .tp-title { font-size:.74rem; font-weight:800; line-height:1.35; color:#0a2c4f; }
    [data-cv-template="classic"] .tp-meta { margin-top:.2rem; font-size:.64rem; font-weight:700; color:#0d6efd; }
    [data-cv-template="classic"] .tp-accent { color:#0d6efd; }
    [data-cv-template="classic"] .tp-footer { height:16px; background:#0a2c4f; clip-path:polygon(0 60%,72% 60%,78% 0,100% 0,100% 100%,0 100%); }

    [data-cv-template="modern"] .tp-watermark span { color:#dceceb; }
    [data-cv-template="modern"] .tp-card { margin-bottom:.75rem; padding:.75rem .9rem; border:1px solid #e2e8f0; border-left:4px solid #0f766e; border-radius:8px; }
    [data-cv-template="modern"] .tp-heading { margin-bottom:.55rem; color:#0f766e; font-size:.66rem; font-weight:800; letter-spacing:.18em; text-transform:uppercase; }
    [data-cv-template="modern"] .tp-copy { font-size:.66rem; line-height:1.65; color:#5a6675; }
    [data-cv-template="modern"] .tp-title { font-size:.72rem; font-weight:800; line-height:1.35; color:#134e4a; }
    [data-cv-template="modern"] .tp-meta { margin-top:.15rem; font-size:.62rem; font-weight:700; color:#0f766e; }
    [data-cv-template="modern"] .tp-tag { padding:2px 8px; border-radius:11px; background:#ccfbf1; color:#115e59; font-size:.62rem; font-weight:700; }

    [data-cv-template="minimal"] .tp-watermark span { color:#eceae7; }
    [data-cv-template="minimal"] .tp-name { color:#18181b; font-family:Georgia, "DejaVu Serif", serif; }
    [data-cv-template="minimal"] .tp-rule { width:54px; margin:14px auto 0; border-top:1px solid #a8a29e; }
    [data-cv-template="minimal"] .tp-heading { margin-bottom:.7rem; border-bottom:1px solid #d6d3d1; padding-bottom:.35rem; color:#18181b; font-size:.62rem; font-weight:700; letter-spacing:.24em; text-transform:uppercase; }
    [data-cv-template="minimal"] .tp-summary { font-family:Georgia, "DejaVu Serif", serif; font-size:.72rem; font-style:italic; line-height:1.6; color:#44403c; }
    [data-cv-template="minimal"] .tp-item-title { font-family:Georgia, "DejaVu Serif", serif; font-size:.78rem; color:#18181b; }
    [data-cv-template="minimal"] .tp-meta { margin-top:1px; font-size:.6rem; color:#78716c; }
    [data-cv-template="minimal"] .tp-copy { font-family:Georgia, "DejaVu Serif", serif; font-size:.68rem; line-height:1.65; color:#57534e; }

    [data-cv-template="elegant"] .tp-watermark span { color:#ece9e2; }
    [data-cv-template="elegant"] .tp-name { color:#111827; font-family:Georgia, "DejaVu Serif", serif; font-weight:700; }
    [data-cv-template="elegant"] .tp-heading { margin-bottom:.5rem; color:#1f2937; font-size:.62rem; font-weight:800; letter-spacing:.24em; text-transform:uppercase; }
    [data-cv-template="elegant"] .tp-diamond { color:#c9a227; }
    [data-cv-template="elegant"] .tp-rule { margin-bottom:.6rem; border-top:1px solid #e7e5e4; }
    [data-cv-template="elegant"] .tp-summary { font-family:Georgia, "DejaVu Serif", serif; font-size:.7rem; font-style:italic; line-height:1.6; color:#3f3f46; }
    [data-cv-template="elegant"] .tp-item { margin-bottom:.7rem; border-left:2px solid #e7e5e4; padding-left:.6rem; }
    [data-cv-template="elegant"] .tp-item-title { font-family:Georgia, "DejaVu Serif", serif; font-size:.74rem; font-weight:700; color:#111827; }
    [data-cv-template="elegant"] .tp-meta { margin-top:1px; font-size:.6rem; color:#a1801a; }
    [data-cv-template="elegant"] .tp-copy { font-size:.66rem; line-height:1.6; color:#52525b; }
    [data-cv-template="elegant"] .tp-tag { padding:2px 8px; border:1px solid #c9a227; color:#78350f; font-size:.62rem; }

    [data-cv-template="compact"] .tp-watermark span { color:#e0f2f7; }
    [data-cv-template="compact"] .tp-heading { margin-bottom:.45rem; border-bottom:1px solid #164e63; padding:0 0 .2rem .35rem; color:#164e63; font-size:.6rem; font-weight:800; letter-spacing:.14em; text-transform:uppercase; }
    [data-cv-template="compact"] .tp-copy { font-size:.6rem; line-height:1.5; color:#52525b; }
    [data-cv-template="compact"] .tp-title { font-size:.66rem; font-weight:800; line-height:1.35; color:#164e63; }
    [data-cv-template="compact"] .tp-meta { margin-top:.15rem; font-size:.58rem; font-weight:700; color:#0891b2; }
    [data-cv-template="compact"] .tp-tag { padding:1px 5px; border:1px solid #a5f3fc; border-radius:3px; background:#ecfeff; color:#155e75; font-size:.58rem; }
    [data-cv-template="compact"] .tp-rows td { padding:1px 0; vertical-align:top; }
    [data-cv-template="compact"] .tp-rows td:first-child { width:42%; padding-right:8px; color:#71717a; }

    @media (min-width:1024px) { [data-cv-template] .tp-paper { min-height:760px; } }

    @media print {
        nav, header:not(.tp-header), form, main > div > div:first-child, aside > div:first-child { display:none !important; }
        body, .min-h-screen { background:#fff !important; }
        main, aside { display:block !important; padding:0 !important; }
        [data-cv-template] .tp-paper { width:210mm !important; min-height:297mm !important; margin:0 auto !important; box-shadow:none !important; }
    }
</style>