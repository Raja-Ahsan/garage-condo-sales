# Admin Theme Audit — Frontend → Cuba Brand Mapping

**Source of truth:** Public site design tokens in `resources/css/web.css` (+ `web/*.css`, `tailwind.config.js`)  
**Target:** Scoped Cuba Admin theme under `.admin-panel`  
**Started:** 2026-07-21  
**Status:** Global theme + Dashboard — Completed

---

## How the frontend stores design tokens

| Mechanism | Used? | Location |
|-----------|-------|----------|
| CSS variables (`:root`) | **Yes** — primary system | `resources/css/web.css` |
| SCSS variables | No | — |
| Tailwind theme colors | **Yes** — maps to CSS vars | `tailwind.config.js` |
| Bootstrap variables | No (public site) | — |
| Inline color values | Limited hex in components | `resources/css/web/components.css` (`#d9b678`, `#a8823a`, `#8a6a2c`, `#1a1a1a`) |
| Gradient utilities / classes | **Yes** | `.gold-text`, `.btn-gold`, `.card-lux`, body radial gradients |
| Theme config files | Tailwind only | `tailwind.config.js` |

**Typography:** Body `Inter`; headings `"Playfair Display"` (`resources/css/web/base.css`).  
**Tone:** Dark-first luxury (near-black blue-gray surfaces, gold primary, emerald accent).

---

## Design token extraction

OKLCH values are the source tokens. Hex companions are admin-safe approximations for ApexCharts / Cuba JS (which expect hex).

| Design Token | Frontend Value | Hex companion (admin/JS) | Frontend Source File | Admin Usage | Status |
|--------------|----------------|--------------------------|----------------------|-------------|--------|
| Primary / Gold | `oklch(0.82 0.09 82)` | `#d9b678` | `resources/css/web.css` | Buttons, links, active nav, chart primary | Completed |
| Primary foreground | `oklch(0.16 0.008 240)` | `#21242a` | `resources/css/web.css` | Text on gold buttons | Completed |
| Gold soft | `oklch(0.9 0.06 85)` | `#e8d5a3` | `resources/css/web.css` | Ghost buttons, highlights | Completed |
| Gold deep (gradient end) | `#8a6a2c` / `#a8823a` | same | `resources/css/web/components.css` | Button gradients | Completed |
| Secondary surface | `oklch(0.28 0.01 240)` | `#3c414b` | `resources/css/web.css` | Secondary buttons, chips | Completed |
| Accent / Emerald | `oklch(0.55 0.11 175)` | `#2f9e8f` | `resources/css/web.css` | Accent badges, chart series 2 | Completed |
| Page background | `oklch(0.16 0.008 240)` | `#21242a` | `resources/css/web.css`, `web/base.css` | Admin body / page-body | Completed |
| Body radial wash (top) | `oklch(0.22 0.02 240 / 0.6)` | — | `resources/css/web/base.css` | Soft admin background (not behind tables) | Completed |
| Body radial wash (bottom) | `oklch(0.14 0.01 240 / 0.9)` | — | `resources/css/web/base.css` | Soft admin background | Completed |
| Surface / Card | `oklch(0.19 0.008 240)` | `#282c33` | `resources/css/web.css` | Cards, sidebar, header | Completed |
| Surface 2 | `oklch(0.23 0.01 240)` | `#32363f` | `resources/css/web.css` | Elevated panels, table header | Completed |
| Foreground / Heading | `oklch(0.97 0.005 240)` | `#f4f5f7` | `resources/css/web.css` | Headings, body text | Completed |
| Muted text / Steel | `oklch(0.72 0.01 240)` / `--steel` | `#a9aeb8` | `resources/css/web.css` | Labels, breadcrumbs, muted | Completed |
| Muted fill | `oklch(0.24 0.008 240)` | `#333740` | `resources/css/web.css` | Input / hover fills | Completed |
| Border | `oklch(0.32 0.008 240 / 60%)` | `rgba(74,78,88,0.6)` | `resources/css/web.css` | Cards, tables, inputs | Completed |
| Input fill | `oklch(0.28 0.008 240)` | `#3c414b` | `resources/css/web.css` | Form controls | Completed |
| Focus ring | `oklch(0.82 0.09 82)` (= primary) | `#d9b678` | `resources/css/web.css` | Focus borders | Completed |
| Destructive | `oklch(0.62 0.22 27)` | `#e0534a` | `resources/css/web.css` | Delete / danger | Completed |
| Success (semantic) | keep distinguishable | `#65c15c` (Cuba) / emerald accent support | Cuba + accent | Success badges | Completed |
| Warning (semantic) | keep distinguishable | `#ffb37c` approx | Cuba warning | Warning badges | Completed |
| Card gradient | `linear-gradient(180deg, surface → background)` | — | `resources/css/web/components.css` `.card-lux` | Admin cards | Completed |
| Button gradient | `linear-gradient(135deg, #d9b678, #a8823a)` | — | `components.css` `.btn-gold` | `.btn-primary` | Completed |
| Gold text gradient | `135deg gold-soft → gold → #8a6a2c` | — | `components.css` `.gold-text` | Optional titles | Completed |
| Hairline / card border | `color-mix(gold 18–35%)` | gold @ 18–35% alpha | `components.css` | Card borders | Completed |
| Radius (token) | `--radius: 0.5rem` | `8px` | `web.css` | General | Completed |
| Button radius (lux) | `2px` | `2px` | `components.css` | Primary/secondary buttons | Completed |
| Card radius (lux) | `4px` | `4px` | `components.css` `.card-lux` | Cards | Completed |
| Shadow (button) | `0 10px 30px -12px` gold mix | — | `components.css` | Primary buttons | Completed |
| Shadow (hover) | `0 18px 40px -12px` gold mix | — | `components.css` | Hover elevation | Completed |
| Heading font | Playfair Display | — | `web/base.css` | Page titles, card h5 | Completed |
| Body font | Inter | — | `web/base.css` | UI, tables, forms | Completed |

---

## Branding issue tracker (theme pass)

| Module | Route | Issue | Priority | Files | Status |
|--------|-------|-------|----------|-------|--------|
| Design tokens | — | Need shared admin CSS variables from frontend | High | `resources/css/admin/theme.css` | Completed |
| Page background | Admin global | Default Cuba gray ≠ frontend dark | High | `theme.css`, `master.blade.php` | Completed |
| Sidebar | Admin global | Purple active (`#7366ff`) ≠ gold primary | High | `theme.css` | Completed |
| Header | Admin global | Light header ≠ frontend identity | Medium | `theme.css` | Completed |
| Breadcrumbs | Admin global | Default styling | Medium | `theme.css` | Completed |
| Dashboard cards/widgets | `/admin` | Default Cuba purple widgets | High | `theme.css` | Completed |
| Dashboard charts | `/admin` | Hardcoded `#7366FF` in `default.js` | High | `dashboard-charts.js` | Completed |
| Dashboard tables | `/admin` | Light table chrome | Medium | `theme.css` | Completed |
| Buttons / badges / inputs | Dashboard | Bootstrap defaults | High | `theme.css` | Completed |
| Login | Breeze `/login` | Not in this pass | Medium | Auth views | Pending |

---

## Rules applied

- Admin styles load **only** via admin layout Vite entry (`admin.css`).
- All overrides scoped under `.admin-panel`.
- Public `web.css` is **not** imported into admin.
- Semantic success / warning / danger preserved.
- Cuba collapse, overlays, and dark toggle (`dark-only`) preserved.
