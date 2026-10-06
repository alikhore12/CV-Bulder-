# CV Builder --- Complete Modernization & Upgrade Specification

## 1. Project Understanding

This specification is based on the uploaded `cv-bulder` Laravel project.

### Current stack

-   Laravel application
-   Blade templates
-   Tailwind CSS
-   Alpine.js
-   Vite
-   DomPDF for A4 PDF generation
-   Browser `localStorage` for the current draft flow
-   Existing CV template system
-   Existing CV-related database migrations/models

### Current builder already contains

-   Personal information
-   Professional title
-   Location
-   Email
-   Phone
-   Website
-   LinkedIn
-   Profile photo
-   Professional summary
-   Education
-   Work experience
-   Skills
-   Languages
-   Certifications
-   Other/personal information
-   Live A4 preview
-   Five existing templates
-   Local draft saving
-   PDF download
-   Print functionality
-   Responsive builder UI

Existing templates:

1.  Blue Professional / Classic
2.  Modern Teal
3.  Minimal Serif
4.  Elegant Gold
5.  Compact Cyan

------------------------------------------------------------------------

# 2. Main Goal

Upgrade the existing CV Builder into a **modern, professional,
ATS-friendly, responsive CV creation platform** without destroying the
existing Laravel architecture.

The final product should feel like a modern SaaS CV builder rather than
a basic form.

The design should be:

-   Modern
-   Clean
-   Professional
-   Fast
-   Responsive
-   Easy for beginners
-   ATS-friendly
-   Print/PDF friendly
-   Accessible
-   Visually consistent
-   Suitable for students, fresh graduates, developers, designers,
    marketers and experienced professionals

Do not create an unnecessarily complicated UI.

The interface should guide the user step by step.

------------------------------------------------------------------------

# 3. Important Existing Project Findings

## 3.1 Database already supports more CV data than the current UI

The project already contains database migrations/models for:

-   CVs
-   Personal information
-   Experience
-   Education
-   Skills
-   Projects
-   Certifications
-   Languages
-   References
-   AI generations
-   Job descriptions

Therefore, the frontend should be upgraded to expose these existing
capabilities instead of creating duplicate concepts.

## 3.2 Existing project table should be used

The existing `cv_projects` structure supports:

-   name
-   role
-   technologies
-   URL
-   description
-   sort order

Add a proper **Projects** section to the builder.

## 3.3 Existing references table should be used

The existing `cv_references` structure supports:

-   name
-   position
-   company
-   email
-   phone
-   relationship
-   sort order

Add a proper **References** section.

## 3.4 Existing personal-information schema already has GitHub

The personal information migration already contains:

-   GitHub

Add GitHub to the builder and templates.

## 3.5 Certification schema is richer than current UI

The database supports:

-   issue date
-   expiry date
-   credential URL

Add these fields to the certification UI.

## 3.6 Education schema and current frontend are not perfectly aligned

The current builder has extra academic fields such as:

-   field
-   total marks
-   obtained marks
-   percentage

Keep these useful fields for Pakistani users, but structure them as
optional fields so the main CV remains clean.

------------------------------------------------------------------------

# 4. Recommended New Builder Structure

Use a clear numbered step system.

## Step 01 --- Personal Information

Fields:

-   Full name
-   Professional title
-   Profile photo
-   Email
-   Phone
-   City / Country
-   Website
-   LinkedIn
-   GitHub

Optional personal information:

-   Full address
-   Date of birth
-   Nationality
-   Domicile
-   CNIC / ID

Important:

Sensitive personal information should be optional and should not appear
automatically in modern professional templates.

Allow a user to explicitly enable/disable personal details.

------------------------------------------------------------------------

# 5. Step 02 --- Professional Summary

Add:

-   Summary textarea
-   Character/word counter
-   AI Improve button
-   Generate summary button
-   Rewrite button
-   Short / balanced / detailed options

Recommended guidance:

> Keep your summary focused on experience, strongest skills,
> specialization and career direction.

Do not force users to write long paragraphs.

------------------------------------------------------------------------

# 6. Step 03 --- Work Experience

Each experience item should contain:

-   Job title
-   Company
-   Location
-   Start date
-   End date
-   Currently working checkbox
-   Description
-   Achievement bullets

Add:

-   Drag/reorder
-   Duplicate
-   Remove
-   Add experience

### Achievement editor

Instead of one large description box, allow bullet points.

Example:

-   Increased organic traffic by 45%.
-   Built 12 responsive WordPress websites.
-   Reduced page load time by 30%.

Provide an optional AI improvement action for individual bullets.

------------------------------------------------------------------------

# 7. Step 04 --- Education

Fields:

-   Degree
-   Field / Major
-   Institution
-   Location
-   Start date/year
-   End date/year
-   CGPA
-   Marks
-   Percentage
-   Description
-   Honors / achievements

For Pakistani education, support:

-   Matric
-   Intermediate
-   BS
-   MS
-   MPhil
-   PhD
-   Diploma
-   Certification

Keep marks/percentage optional.

------------------------------------------------------------------------

# 8. Step 05 --- Skills

Replace the current simple comma-separated input with a structured skill
manager.

Each skill:

-   Skill name
-   Category
-   Proficiency level
-   Optional years of experience

Example categories:

-   Technical Skills
-   Programming
-   Web Development
-   Digital Marketing
-   SEO
-   Design
-   Soft Skills
-   Tools

Allow:

-   Add
-   Remove
-   Reorder
-   Search
-   Quick suggestions

Do not use oversized skill progress bars in ATS templates.

------------------------------------------------------------------------

# 9. Step 06 --- Projects

Add a complete Projects section.

Fields:

-   Project name
-   Role
-   Technologies
-   Project URL
-   GitHub URL
-   Start date
-   End date
-   Description
-   Key achievements

Example:

**Medical Management System**

Role: Full Stack Developer

Technologies: Laravel, PHP, MySQL, Tailwind CSS

Achievements:

-   Built appointment management workflow.
-   Added role-based authentication.
-   Created responsive admin dashboard.

Projects should be especially prominent for students and fresh
graduates.

------------------------------------------------------------------------

# 10. Step 07 --- Certifications

Fields:

-   Certification name
-   Organization
-   Issue date
-   Expiry date
-   Credential ID
-   Credential URL

Add an optional:

-   No expiry checkbox

------------------------------------------------------------------------

# 11. Step 08 --- Languages

Each language:

-   Language
-   Proficiency

Use predefined proficiency options:

-   Native
-   Fluent
-   Professional
-   Intermediate
-   Basic

Optional visual proficiency can be enabled only for decorative
templates.

------------------------------------------------------------------------

# 12. Step 09 --- References

Allow:

-   Reference name
-   Position
-   Company
-   Email
-   Phone
-   Relationship

Add two display modes:

### Mode A

"References available upon request"

### Mode B

Show full references.

Default should be Mode A for modern CVs.

------------------------------------------------------------------------

# 13. Step 10 --- Additional Sections

Allow users to enable optional sections:

-   Awards
-   Achievements
-   Publications
-   Volunteer Experience
-   Interests
-   Hobbies
-   Conferences
-   Training
-   Memberships
-   Extracurricular Activities

Do not force every section to appear.

Only render a section when it contains data.

------------------------------------------------------------------------

# 14. Builder UX Upgrade

The current accordion form works, but it should become more polished.

## Recommended layout

Desktop:

``` text
------------------------------------------------------------
Top Header
------------------------------------------------------------

Left: Builder                         Right: Live Preview
--------------------------------     -----------------------
Progress                              A4 CV
Personal                              Sticky preview
Summary                               Zoom controls
Experience                            Template selector
Education
Skills
Projects
Certifications
Languages
References
Additional
--------------------------------     -----------------------
```

Mobile:

``` text
Header
Progress
Current section
Form
Next section
Preview button
```

The preview should become a full-screen modal/drawer on mobile.

------------------------------------------------------------------------

# 15. Progress System

Add a visible CV completion indicator.

Example:

``` text
CV COMPLETION
██████████████████░░ 86%

Great! Add Projects to reach 100%.
```

Calculate completion from meaningful fields rather than simply counting
inputs.

Suggested weights:

-   Personal: 15%
-   Summary: 10%
-   Experience: 20%
-   Education: 15%
-   Skills: 15%
-   Projects: 10%
-   Certifications: 5%
-   Languages: 5%
-   References/optional: 5%

For students, projects should have higher importance.

------------------------------------------------------------------------

# 16. Smart CV Guidance

Add small contextual hints.

Examples:

### Summary

"Keep this to 3--5 lines."

### Experience

"Start bullets with action verbs."

### Skills

"Add skills relevant to the job you are applying for."

### Projects

"Show what you built, which tools you used and what result you
achieved."

Do not overwhelm users with instructions.

------------------------------------------------------------------------

# 17. Modern Header Design

Replace the current basic header with a modern SaaS-style top bar.

Recommended:

-   CV Builder logo
-   Current CV name
-   Save status
-   Autosave status
-   Preview
-   Download PDF
-   More menu

Example:

``` text
[CV] CV Builder     My Professional CV     ● Saved
                                      [Preview] [Download PDF]
```

On mobile:

``` text
[☰] CV Builder                 [↓]
```

------------------------------------------------------------------------

# 18. Modern Color System

Use a neutral base with one configurable accent.

Base:

-   White
-   Slate 50
-   Slate 100
-   Slate 500
-   Slate 700
-   Slate 900

Accent options:

-   Indigo
-   Blue
-   Teal
-   Emerald
-   Violet
-   Rose
-   Amber

The user can choose the CV accent color.

Do not use too many colors simultaneously.

------------------------------------------------------------------------

# 19. Modern Form Components

Create reusable styles/components for:

-   Input
-   Textarea
-   Select
-   Date input
-   Toggle
-   Checkbox
-   Tag input
-   Add button
-   Delete button
-   Drag handle
-   Section header
-   Empty state
-   Tooltip
-   AI action button

Inputs should have:

-   Clear labels
-   Good spacing
-   Focus state
-   Validation state
-   Helpful placeholders
-   Accessible keyboard behavior

------------------------------------------------------------------------

# 20. Modern Template System

Keep the existing five templates but redesign them.

## Template 1 --- ATS Professional

Purpose:

-   Corporate
-   ATS
-   Job applications

Design:

-   Single column
-   Black/dark text
-   Minimal decoration
-   Strong typography
-   Clear headings
-   No unnecessary icons
-   No complex graphics

Recommended sections:

Header Summary Experience Education Skills Projects Certifications

------------------------------------------------------------------------

# 21. Template 2 --- Modern Split

Purpose:

-   Developers
-   Designers
-   Marketers

Design:

``` text
---------------------------------------
| Profile / Contact                  |
---------------------------------------
| Sidebar       | Main Content       |
| Skills        | Summary            |
| Languages     | Experience         |
| Tools         | Projects           |
|               | Education          |
---------------------------------------
```

Use subtle accent background.

------------------------------------------------------------------------

# 22. Template 3 --- Minimal Executive

Purpose:

-   Experienced professionals
-   Managers
-   Corporate jobs

Design:

-   Strong name
-   Large whitespace
-   Thin dividers
-   Elegant typography
-   No excessive cards

------------------------------------------------------------------------

# 23. Template 4 --- Creative Portfolio

Purpose:

-   Designers
-   Developers
-   Freelancers
-   Digital marketers

Design:

-   Accent color
-   Project-focused
-   Modern cards
-   Optional icons
-   Portfolio links
-   GitHub/website prominence

Do not make it overly colorful.

------------------------------------------------------------------------

# 24. Template 5 --- Compact One Page

Purpose:

-   Students
-   Fresh graduates
-   Job applications requiring one-page CV

Design:

-   Dense but readable
-   Small spacing
-   Two-column sections where appropriate
-   Strong hierarchy

------------------------------------------------------------------------

# 25. Template 6 --- Pakistan Professional

Add a specialized template for Pakistani users.

Optional sections:

-   Domicile
-   CNIC
-   Date of birth
-   Father's name
-   Address

Important:

These fields should only appear when the user explicitly enables them.

This template should remain professional rather than looking like an
old-style biodata.

------------------------------------------------------------------------

# 26. ATS Mode

Add an ATS-friendly toggle:

``` text
ATS Friendly
[ ON ]
```

When enabled:

-   Remove decorative graphics
-   Remove unnecessary icons
-   Use simple headings
-   Use standard fonts
-   Avoid text inside images
-   Keep predictable section structure
-   Keep strong contrast
-   Use standard dates
-   Use selectable text

Add a short explanation:

> ATS-friendly mode keeps your CV easy for recruitment software to read.

------------------------------------------------------------------------

# 27. Live Preview Improvements

The current preview should become more interactive.

Add:

-   Zoom in
-   Zoom out
-   Fit to screen
-   Page count
-   Fullscreen
-   Mobile preview
-   Desktop preview
-   Template selector
-   Accent color selector

Example:

``` text
Live Preview                         100%
[−] [100%] [+] [Fullscreen]

A4
Page 1 of 2
```

------------------------------------------------------------------------

# 28. Page Management

The preview should detect:

-   One page
-   Two pages
-   Three pages

Display:

``` text
2 pages
```

Avoid cutting sections badly between pages.

For PDF templates:

-   Use A4
-   Preserve margins
-   Prevent headings from being separated from content
-   Avoid orphaned bullet points
-   Avoid huge blank areas

------------------------------------------------------------------------

# 29. PDF Improvements

Current PDF generation should be upgraded to match the live preview as
closely as possible.

Required:

-   A4
-   Correct margins
-   Good typography
-   Page breaks
-   No broken sections
-   No unexpected clipping
-   Embedded profile image
-   Clickable URLs where DomPDF supports them
-   Correct filename based on CV name

Example:

`Shahzad-Ali-CV.pdf`

------------------------------------------------------------------------

# 30. Print Improvements

Print mode should:

-   Hide builder UI
-   Hide navigation
-   Hide controls
-   Show only CV
-   Preserve A4 dimensions
-   Remove unnecessary shadows
-   Keep page breaks correct

------------------------------------------------------------------------

# 31. Draft System Upgrade

Current localStorage draft is useful, but improve it.

Use:

``` text
Auto-save
```

Save automatically after changes with a short debounce.

Show:

``` text
Saving...
Saved just now
```

Also keep the current manual Save button.

------------------------------------------------------------------------

# 32. Saved CV System

The existing database already has a `cvs` table.

Create a proper authenticated CV dashboard.

Example:

``` text
My CVs

[+ Create New CV]

----------------------------------------
Frontend Developer CV
Updated 2 min ago
[Edit] [Preview] [Duplicate] [Download]
----------------------------------------

Digital Marketing CV
Updated yesterday
[Edit] [Preview] [Duplicate] [Download]
----------------------------------------
```

Allow multiple CVs.

This is important because a user may create:

-   Software Developer CV
-   SEO CV
-   Digital Marketing CV
-   Freelancer CV

------------------------------------------------------------------------

# 33. Duplicate CV

Add:

``` text
Duplicate CV
```

Use it for creating a job-specific version.

Example:

``` text
Software Developer CV
        ↓
Duplicate
        ↓
Software Developer — Google Application
```

------------------------------------------------------------------------

# 34. Job-Specific CV

Use the existing `job_descriptions` table.

Allow:

1.  Paste job description
2.  Analyze job
3.  Extract important keywords
4.  Compare with CV
5.  Show missing skills
6.  Suggest improvements

Do not automatically insert false experience.

Suggestions must be editable by the user.

------------------------------------------------------------------------

# 35. ATS Analysis

Add an optional ATS analysis screen.

Show:

``` text
ATS Readiness

Contact Information       ✓
Professional Summary      ✓
Work Experience           ✓
Skills                    ✓
Education                 ✓
Projects                  ✓

Keyword Coverage          82%
Formatting                Good
Missing Keywords          4
```

Avoid presenting the result as a guaranteed hiring score.

It should be described as an analysis/helper, not a hiring prediction.

------------------------------------------------------------------------

# 36. AI Features

The database already contains an `ai_generations` concept.

Create optional AI actions:

### Summary

-   Generate
-   Improve
-   Shorten
-   Make professional

### Experience

-   Improve bullet
-   Convert paragraph to bullets
-   Add stronger action verbs

### Projects

-   Improve description
-   Generate concise project summary

### Job Match

-   Analyze job description
-   Suggest relevant existing skills
-   Identify missing keywords

Important AI rule:

AI must not invent:

-   Companies
-   Degrees
-   Certifications
-   Job titles
-   Achievements
-   Metrics
-   Years of experience

The user must confirm generated content.

------------------------------------------------------------------------

# 37. Template Customization

Add a design panel:

``` text
Design

Template
[Modern Split]

Accent
[Indigo]

Font
[Inter]

Spacing
[Balanced]

Layout
[One Page]

Photo
[Show]

ATS Mode
[ON]
```

Only expose options that are safe for the selected template.

------------------------------------------------------------------------

# 38. Typography

Use a clean modern font system.

Recommended web fonts:

-   Inter
-   Source Sans 3
-   IBM Plex Sans
-   Plus Jakarta Sans

For ATS PDF, use a reliable embedded/system-safe font where required by
the PDF engine.

Do not depend on a web font being available inside DomPDF.

------------------------------------------------------------------------

# 39. Icons

Use icons sparingly.

Good uses:

-   Email
-   Phone
-   Website
-   GitHub
-   LinkedIn
-   Location

For ATS mode, allow icons to disappear.

Avoid using icons as replacements for important text labels.

------------------------------------------------------------------------

# 40. Accessibility

Implement:

-   Keyboard navigation
-   Visible focus states
-   Proper labels
-   ARIA labels where needed
-   Button titles
-   Good contrast
-   Error messages
-   Accessible dialogs
-   Screen-reader friendly structure

Do not rely on color alone.

------------------------------------------------------------------------

# 41. Responsive Design

### Desktop

Two-column builder.

### Tablet

Reduced spacing and narrower preview.

### Mobile

Single-column builder.

Preview becomes a modal/full-screen panel.

Buttons should remain easy to tap.

Avoid horizontal scrolling.

------------------------------------------------------------------------

# 42. Empty States

Replace plain text such as:

> Your education history will appear here.

with useful empty states.

Example:

``` text
Education

No education added yet.

[+ Add Education]
```

In preview, empty sections should normally be hidden rather than
displayed as placeholder text.

------------------------------------------------------------------------

# 43. Data Privacy

Important:

-   Do not expose saved CVs publicly.
-   Protect authenticated CV routes.
-   Authorize CV ownership.
-   Validate all incoming data.
-   Sanitize URLs.
-   Validate uploaded images.
-   Limit image size.
-   Avoid storing unnecessary sensitive personal information.

CNIC should never be shown by default.

------------------------------------------------------------------------

# 44. Security Improvements

Review:

-   Authorization policies
-   CSRF
-   Request validation
-   File upload validation
-   Rate limiting
-   AI request limits
-   PDF generation limits
-   URL validation
-   User ownership checks

Do not allow users to select arbitrary Blade template names.

Keep a whitelist of template slugs.

------------------------------------------------------------------------

# 45. Existing Code Fixes / Technical Cleanup

## Fix 1 --- PDF validation duplicate key

The current PDF controller contains an `experience` validation key more
than once.

Clean this up so the validation definition has one authoritative
`experience` array structure.

## Fix 2 --- Template default consistency

The builder currently initializes the first template from the returned
template collection while the backend has its own default.

Make frontend/backend defaults consistent.

Recommended:

``` text
ATS Professional / classic
```

or explicitly choose the new default and use it everywhere.

## Fix 3 --- Personal information mismatch

The database supports GitHub but the current builder does not expose it.

Add GitHub.

## Fix 4 --- Projects missing from builder

The database has `cv_projects`, but the current builder does not expose
Projects.

Add it.

## Fix 5 --- References missing from builder

The database has `cv_references`, but the current builder does not
expose References.

Add it.

## Fix 6 --- Certification fields incomplete

Add:

-   expiry date
-   credential ID
-   credential URL

## Fix 7 --- Language naming consistency

Current frontend uses `level`; database uses `proficiency`.

Standardize the application terminology.

## Fix 8 --- Experience location

The database supports experience location but current builder does not.

Add it.

## Fix 9 --- Education location

The database supports education location but current builder does not.

Add it.

------------------------------------------------------------------------

# 46. Componentization

Do not keep the entire builder as one huge Blade file.

Break it into reusable Blade components/partials.

Suggested:

``` text
resources/views/components/cv-builder/
    header.blade.php
    progress.blade.php
    section-card.blade.php
    personal-form.blade.php
    summary-form.blade.php
    experience-form.blade.php
    education-form.blade.php
    skills-form.blade.php
    projects-form.blade.php
    certifications-form.blade.php
    languages-form.blade.php
    references-form.blade.php
    additional-form.blade.php
    design-panel.blade.php
    preview-toolbar.blade.php
```

This makes the project easier to maintain.

------------------------------------------------------------------------

# 47. JavaScript Architecture

The current Alpine component is large.

Keep Alpine if desired, but split logic into clearer modules.

Recommended responsibilities:

``` text
cv state
draft storage
section management
template management
preview controls
photo handling
PDF download
completion calculation
drag/drop ordering
```

Do not introduce a large JavaScript framework just for the sake of
modernization.

Alpine is sufficient for this project.

------------------------------------------------------------------------

# 48. Recommended New CV Data Structure

Use a consistent structure similar to:

``` js
cv = {
    name: '',
    headline: '',
    photo: '',
    email: '',
    phone: '',
    location: '',
    website: '',
    linkedin: '',
    github: '',

    summary: '',

    experience: [],
    education: [],
    skills: [],
    projects: [],
    certifications: [],
    languages: [],
    references: [],

    awards: [],
    volunteer: [],
    publications: [],
    interests: [],

    personalDetails: {
        address: '',
        dateOfBirth: '',
        nationality: '',
        domicile: '',
        cnic: ''
    },

    settings: {
        template: 'classic',
        accent: '#4f46e5',
        atsMode: true,
        showPhoto: true,
        showReferences: false
    }
}
```

Keep the structure compatible with the Laravel database layer.

------------------------------------------------------------------------

# 49. Modern CV Visual Hierarchy

Every template must have clear hierarchy:

``` text
NAME
Professional Title
Contact

SUMMARY

EXPERIENCE
Job title
Company | Date
Achievement
Achievement

PROJECTS
Project
Technology
Result

EDUCATION

SKILLS

CERTIFICATIONS
```

Name should be visually dominant.

Section headings should be easy to scan.

Body text should never be too small.

------------------------------------------------------------------------

# 50. Design Rules

Avoid:

-   Excessive gradients
-   Huge shadows
-   Excessive rounded cards
-   Too many colors
-   Decorative elements that hurt ATS
-   Tiny text
-   Giant profile photos
-   Fake skill percentages
-   Unnecessary charts
-   Overloaded sidebars

Prefer:

-   White space
-   Clear hierarchy
-   Strong typography
-   Consistent spacing
-   Subtle borders
-   One accent color
-   Professional alignment

------------------------------------------------------------------------

# 51. Preview Design

The preview should look like a real A4 paper.

Use:

``` text
background: soft gray
paper: white
shadow: subtle
width: A4 ratio
```

Example:

``` text
Builder Background
      ↓
 ┌───────────────────┐
 │                   │
 │     A4 CV         │
 │                   │
 │                   │
 │                   │
 └───────────────────┘
```

Do not make the CV look like a web dashboard.

------------------------------------------------------------------------

# 52. Template Selector

Instead of plain text buttons, use visual template cards.

Example:

``` text
┌─────────────┐
│  Mini CV    │
│  preview    │
│             │
└─────────────┘
ATS
```

Cards should show a tiny visual preview.

Selected template should have:

-   Accent border
-   Check icon
-   Clear selected state

------------------------------------------------------------------------

# 53. Final Navigation Flow

Recommended user journey:

``` text
Landing Page
      ↓
Create CV
      ↓
Personal Information
      ↓
Summary
      ↓
Experience
      ↓
Education
      ↓
Skills
      ↓
Projects
      ↓
Certifications
      ↓
Languages
      ↓
References
      ↓
Design
      ↓
ATS Check
      ↓
Preview
      ↓
Download PDF
```

Users should also be able to jump between sections.

------------------------------------------------------------------------

# 54. Final Landing Page Upgrade

The home page should communicate the product clearly.

Hero:

``` text
Create a Professional CV in Minutes

Build a modern, ATS-friendly resume with
live preview and polished PDF export.

[Create My CV] [View Templates]
```

Add:

-   Template preview cards
-   Features
-   How it works
-   ATS explanation
-   Mobile-friendly statement
-   FAQ
-   CTA

Do not make the landing page overly long.

------------------------------------------------------------------------

# 55. SEO

For the public landing page:

-   Unique title
-   Meta description
-   Semantic headings
-   Open Graph tags
-   Canonical URL
-   Descriptive URLs
-   Structured content
-   Fast loading
-   Mobile responsive

Suggested title:

`Free CV Builder — Create Professional ATS-Friendly Resumes`

Do not promise outcomes such as guaranteed interviews or jobs.

------------------------------------------------------------------------

# 56. Performance

Optimize:

-   Blade rendering
-   Alpine state size
-   Image compression
-   LocalStorage payload
-   PDF generation
-   Database queries
-   Template loading

For profile images:

-   Validate MIME type
-   Limit dimensions
-   Compress where practical
-   Do not allow huge base64 payloads

------------------------------------------------------------------------

# 57. Testing Requirements

Test:

### Builder

-   Add section
-   Remove section
-   Reorder section
-   Save draft
-   Restore draft
-   Reset
-   Switch templates
-   Change accent
-   Upload image
-   Remove image

### PDF

-   One page
-   Two pages
-   Long summary
-   Long experience
-   Many projects
-   Many skills
-   No photo
-   With photo
-   Urdu/Unicode content where supported
-   Special characters

### Security

-   Unauthorized CV access
-   Invalid template
-   Invalid upload
-   Invalid URL
-   Oversized request
-   CSRF

------------------------------------------------------------------------

# 58. Definition of Done

The upgrade is complete when:

-   Existing builder still works.
-   Existing templates are preserved or safely redesigned.
-   Projects are supported.
-   References are supported.
-   GitHub is supported.
-   Certifications are richer.
-   Experience/Education locations are supported.
-   CV completion progress exists.
-   Autosave exists.
-   Saved CV dashboard exists for authenticated users.
-   Multiple CVs can be created.
-   CVs can be duplicated.
-   Template selection is visual.
-   Modern responsive UI is implemented.
-   ATS mode exists.
-   Live preview is improved.
-   PDF output is stable.
-   Print output is clean.
-   Sensitive personal information is optional.
-   User data is protected.
-   Empty sections are hidden in final CV.
-   All templates maintain strong typography and spacing.
-   Mobile UX works without horizontal scrolling.

------------------------------------------------------------------------

# 59. Recommended Implementation Order

Do not attempt every feature at once.

## Phase 1 --- Foundation

1.  Clean existing builder code.
2.  Fix validation inconsistencies.
3.  Add GitHub.
4.  Add Projects.
5.  Add References.
6.  Improve certifications.
7.  Improve experience/education fields.
8.  Add structured skills.

## Phase 2 --- UI

1.  Modern header.
2.  Progress indicator.
3.  Better section cards.
4.  Better empty states.
5.  Responsive mobile builder.
6.  Visual template selector.
7.  Preview toolbar.

## Phase 3 --- Templates

1.  ATS Professional.
2.  Modern Split.
3.  Minimal Executive.
4.  Creative Portfolio.
5.  Pakistan Professional.
6.  Compact One Page.

## Phase 4 --- Storage

1.  Authenticated CV dashboard.
2.  Save CV.
3.  Edit CV.
4.  Duplicate CV.
5.  Delete CV.
6.  Draft status.
7.  Last edited time.

## Phase 5 --- Smart Features

1.  Job description analyzer.
2.  ATS analysis.
3.  AI summary.
4.  AI bullet improvement.
5.  Keyword suggestions.

## Phase 6 --- Quality

1.  PDF testing.
2.  Print testing.
3.  Accessibility testing.
4.  Security testing.
5.  Mobile testing.
6.  Performance optimization.

------------------------------------------------------------------------

# 60. Final Design Direction

The final product should feel like:

**Modern SaaS + Professional Resume Tool + Simple Beginner UX**

Not:

**Old-fashioned biodata generator**

The visual language should be:

-   Clean
-   Premium
-   Minimal
-   Professional
-   Modern
-   Human
-   Easy to understand

The user should be able to open the application and immediately
understand:

1.  What information is required.
2.  What is optional.
3.  How complete the CV is.
4.  What the final CV looks like.
5.  How to change the design.
6.  How to download the final PDF.

------------------------------------------------------------------------

# 61. Critical Rule for Implementation

Do not blindly rewrite the entire project.

First reuse:

-   Existing Laravel models
-   Existing migrations
-   Existing CV template system
-   Existing PDF controller
-   Existing Alpine builder
-   Existing authentication
-   Existing Tailwind setup

Then extend the application cleanly.

Avoid duplicate database structures and duplicate business logic.

The final implementation should remain maintainable and
Laravel-conventional.

------------------------------------------------------------------------

# 62. Expected Final Result

The final CV Builder should provide this experience:

``` text
                 CV BUILDER
                      │
             ┌────────▼────────┐
             │ Personal Details │
             └────────┬────────┘
                      ↓
                Professional
                   Summary
                      ↓
                 Experience
                      ↓
                  Education
                      ↓
                    Skills
                      ↓
                  Projects
                      ↓
               Certifications
                      ↓
                  Languages
                      ↓
                 References
                      ↓
                 Design Studio
                      ↓
                ATS Analysis
                      ↓
                 Live Preview
                      ↓
                 Download PDF
```

The final CV itself should be clean enough to submit directly for a
professional job application.

------------------------------------------------------------------------

# 63. One-Line Product Vision

> **Build a fast, modern and beginner-friendly CV builder that creates
> professional, ATS-readable, customizable A4 resumes with live preview,
> reusable templates, saved CVs and optional AI assistance.**
