# Migration Checklist — Elite Garage Suites → Laravel

**React source:** `elite-garage-suites-main` (TanStack Start + React 19)  
**Laravel target:** `garag-condo-sale` (Laravel 12 + Breeze + Cuba Admin)  
**Started:** 2026-07-20

---

## Phase 1 Analysis Summary

| Metric | Count / Detail |
|--------|----------------|
| React pages | **6** public (+ sitemap XML handler) |
| Reusable app components | **3** meaningful (`site.tsx`, `hero-reel.tsx`, root shell) |
| Unused shadcn UI components | **46** — do **not** migrate |
| Public website routes | `/`, `/gallery`, `/specifications`, `/comparables`, `/map`, `/contact` |
| Admin routes (React) | **None** — marketing site only |
| Protected routes (React) | **None** |
| Dynamic routes | **None** |
| API endpoints used | **None** (contact form is client-only fake submit) |
| Auth in React | **None** |
| Images | **7** remote CDN photos + favicon |
| State management | None (local `useState` only) |
| Styling | Tailwind 4 + custom luxury CSS (`styles.css`) |

### Public website routes

| Path | React source | Notes |
|------|--------------|-------|
| `/` | `src/routes/index.tsx` | Homepage — first migration target |
| `/gallery` | `src/routes/gallery.tsx` | Lightbox interaction |
| `/specifications` | `src/routes/specifications.tsx` | Fully static |
| `/comparables` | `src/routes/comparables.tsx` | Fully static |
| `/map` | `src/routes/map.tsx` | Google Maps iframe |
| `/contact` | `src/routes/contact.tsx` | Form → needs Laravel POST |
| `/sitemap.xml` | `src/routes/sitemap[.]xml.ts` | Server XML |

### Admin (Laravel / Cuba — not from React)

| Path | Status | Notes |
|------|--------|-------|
| `/admin` | Exists | Cuba dashboard shell; protect with auth later |
| Breeze `/login`, etc. | Exists | Keep for admin auth |

### Components → Blade vs React

| Stay React | Become Blade |
|------------|--------------|
| `HeroReel` (Ken-Burns slideshow) | Header / Footer / CTA |
| Gallery lightbox (later) | All static page sections |
| — | Specs, comparables, map, contact shell |

### Database required

| Data | Recommendation |
|------|----------------|
| Property details / photos | Start as `config/property.php`; optional DB later |
| Contact inquiries | New `contact_inquiries` table when contact form migrates |
| CMS modules / users | Already in Laravel |

### Auth required

- React site: none
- Laravel: Breeze session auth for admin; add middleware to `/admin`
- No frontend-only guards to replace

### Expected migration risks

1. **Tailwind 3 (Laravel/Breeze) vs Tailwind 4 (React site)** — isolate public `web.css` from Cuba/Breeze styles
2. **Cuba Bootstrap/jQuery** must not load on public pages
3. **Remote CDN images** may break — consider downloading later
4. **Contact form** currently does nothing — needs real backend
5. **Unused shadcn deps** — do not install into Laravel
6. Admin layout lives under `layouts/admin/`; screens must stay under `screens/admin/`

---

## Module Checklist

| Module | React Source | Laravel Destination | Type | Status | Notes |
| ------ | ----------------------- | ------------------------------------------------------- | ------------------ | ------- | ----- |
| Infrastructure | — | Vite React, registry, `web.css`, property config | Setup | Completed | React mount system + luxury CSS |
| Web layout | `__root.tsx` + `site.tsx` | `screens/web/layouts/app.blade.php` | Blade | Completed | Header/footer partials + Alpine mobile nav |
| Home | `src/routes/index.tsx` | `screens/web/pages/home/index.blade.php` | Blade + React | Completed | HeroReel remains React |
| Specifications | `src/routes/specifications.tsx` | `screens/web/pages/specifications/index.blade.php` | Blade | Completed | Static; page-banner + CTA partials |
| Comparables | `src/routes/comparables.tsx` | `screens/web/pages/comparables/index.blade.php` | Blade | Completed | Static; reuses page-banner + CTA |
| Location / Map | `src/routes/map.tsx` | `screens/web/pages/map/index.blade.php` | Blade | Completed | Google Maps iframe via map-embed partial |
| Gallery | `src/routes/gallery.tsx` | `screens/web/pages/gallery/index.blade.php` | Blade + React | Pending | Lightbox as React |
| Contact | `src/routes/contact.tsx` | `screens/web/pages/contact/index.blade.php` | Blade + Form | Completed | Form + validation; map embed added |
| Sitemap | `sitemap[.]xml.ts` | Laravel route / controller | PHP | Pending | Named routes |
| Favicon / robots | `public/` | `public/` | Assets | Completed | Copied from React |
| Admin layout bridge | — | `screens/admin/layouts/app.blade.php` | Cuba Blade | Completed | Wraps `layouts.admin.master` |
| Admin dashboard | — | `screens/admin/pages/dashboard.blade.php` | Cuba Blade | Pending | Move/rename existing screen |
| Auth (admin) | — | Breeze views | Blade | Pending | Protect `/admin` |
| Contact inquiries DB | — | migration + model | Database | Pending | After contact page |
| Remove unused React deps | — | Laravel `package.json` | Cleanup | Pending | End of migration |

---

## Remaining public inner pages (recommended order)

| Order | Page | React Route | React Source | Laravel Route | Blade Destination | Complexity | Status |
| ----- | ---- | ----------- | ------------ | ------------- | ----------------- | ---------- | ------ |
| 1 | Specifications | `/specifications` | `src/routes/specifications.tsx` | `web.specifications` | `screens.web.pages.specifications.index` | Low | Completed |
| 2 | Comparables | `/comparables` | `src/routes/comparables.tsx` | `web.comparables` | `screens.web.pages.comparables.index` | Low | Completed |
| 3 | Location / Map | `/map` | `src/routes/map.tsx` | `web.map` | `screens.web.pages.map.index` | Low | Completed |
| 4 | Gallery | `/gallery` | `src/routes/gallery.tsx` | `web.gallery` | `screens.web.pages.gallery.index` | Medium | Pending |
| 5 | Contact | `/contact` | `src/routes/contact.tsx` | `web.contact` / `web.contact.store` | `screens.web.pages.contact.index` | Medium | Completed |

Order rationale: static pages first → map iframe → interactive gallery → form/contact last.

---

## Migration Order (remaining)

1. ~~Analyze both projects~~
2. ~~Create `MIGRATION_CHECKLIST.md`~~
3. ~~Fix Laravel Vite and React setup~~
4. ~~Create public layout~~
5. Integrate Cuba admin layout under `screens/admin/layouts/`
6. ~~Migrate shared property data / fonts / CSS~~
7. ~~Migrate public header and footer~~
8. ~~Migrate public homepage~~
9. ~~Test homepage / build~~
10. ~~Migrate Specifications~~
11. ~~Migrate Comparables~~
12. ~~Migrate Map + Contact (maps)~~
13. Gallery
14. Sitemap
15. Admin dashboard rename + auth middleware
16. Contact inquiries DB + email (optional enhancement)
17. Final report

---

## Pages migrated

1. **Homepage** — Completed  
2. **Specifications** — Completed  
3. **Comparables** — Completed  
4. **Location / Map** — Completed  
5. **Contact** — Completed (includes map embed)  
