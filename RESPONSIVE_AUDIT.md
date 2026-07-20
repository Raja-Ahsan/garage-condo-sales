# Responsive Audit — Public Website & Admin

**Started:** 2026-07-20  
**Latest pass:** Specifications (`/specifications`)

## Breakpoints tested (target)

`320 · 360 · 375 · 390 · 414 · 480 · 576 · 768 · 820 · 1024 · 1280 · 1440 · 1920`

---

## Issue log

| Page | Route | Issue | Screen Width | Severity | File | Status |
| ---- | ----- | ----- | ------------ | -------- | ---- | ------ |
| Global | `*` | No img/media max-width or overflow safety | ≤414px | High | `resources/css/web.css` | Completed |
| Global | `*` | `.container-lux` padding too wide on tiny phones | ≤360px | Medium | `resources/css/web/*.css` | Completed |
| Global | `*` | `.eyebrow` letter-spacing + decorative lines overflow | ≤390px | High | `components.css` | Completed |
| Global | `*` | Buttons lack 44px touch target / wrap awkwardly | ≤414px | Medium | `components.css` | Completed |
| Header | `*` | Mobile menu missing `aria-expanded` / `aria-controls` | ≤1023px | High | `header.blade.php` | Completed |
| Header | `*` | Body scroll not locked when menu open | ≤1023px | Medium | `layouts/app.blade.php` | Completed |
| Header | `*` | Long mobile menu can exceed viewport height | ≤390×700 | Medium | `header.blade.php` | Completed |
| Footer | `*` | Copyright row tracking causes overflow | ≤360px | Medium | `footer.blade.php` / CSS | Completed |
| Footer | `*` | Long email may not wrap | ≤320px | Low | `footer.blade.php` / CSS | Completed |
| Home | `/` | Hero `min-h-[640px]` overflows short viewports | ≤375×667 | High | `hero.blade.php` | Completed |
| Home | `/` | Hero H1 / CTA cramped; no fluid type | ≤375px | High | `hero.blade.php` / CSS | Completed |
| Home | `/` | Large section margins (`mt-32`) waste mobile space | ≤575px | Medium | home sections | Completed |
| Home | `/` | Overview stat cards `p-8` cramped in 2-col | ≤360px | Medium | `overview.blade.php` | Completed |
| Home | `/` | Investment price `text-6xl` + `p-10` overflow risk | ≤375px | High | `investment.blade.php` | Completed |
| Home | `/` | Investment 3-col stats tracking overflow | ≤320px | Medium | `investment.blade.php` | Completed |
| Home | `/` | CTA card padding heavy on small screens | ≤375px | Low | `cta.blade.php` | Completed |
| Specs | `/specifications` | Page banner H1 `text-4xl` overflows / wraps poorly | ≤375px | High | `page-banner.blade.php` | Completed |
| Specs | `/specifications` | Spec list flex items lack `min-width: 0` (long lines) | ≤414px | High | `spec-card.blade.php` | Completed |
| Specs | `/specifications` | Spec cards `p-8` too heavy on narrow screens | ≤375px | Medium | `spec-card.blade.php` | Completed |
| Specs | `/specifications` | Additional Features card `p-10` + dense 3-col copy | ≤575px | Medium | `additional.blade.php` | Completed |
| Specs | `/specifications` | Unit grid gap / stacking spacing | ≤768px | Low | `units.blade.php` | Completed |
| Comparables | `/comparables` | Pending inner-page pass | — | — | — | Pending |
| Map | `/map` | Map iframe / info cards pending audit | — | — | — | Pending |
| Contact | `/contact` | Form columns / map pending audit | — | — | — | Pending |
| Gallery | `/gallery` | Page not migrated yet | — | — | — | Blocked |
| Admin | `/admin` | Cuba sidebar / tables pending (scoped later) | — | — | — | Pending |

---

## Pass order

1. ~~Global CSS + containers~~
2. ~~Public header + mobile nav~~
3. ~~Public footer~~
4. ~~Homepage~~
5. ~~Specifications~~
6. Comparables (next)
7. Map → Contact
8. Gallery (after migration)
9. Admin layout / dashboard / tables

---

## Specifications pass result

**Completed** for `/specifications` at 320 / 375 / 414 / 768 / 1024 / 1440 (CSS + layout review; page HTTP 200).  
Root causes fixed: banner typography, flex `min-width: 0` on long spec lines, card padding, additional features stack.  
Desktop 2-column unit cards and design language preserved.  
`npm run build` — passed.

Next: Comparables.
