# Admin Panel Audit — Dual Luxury Garage Condos

**Template:** Cuba Admin (Bootstrap 5) — do not replace  
**Public site:** Out of scope (do not modify)  
**Started:** 2026-07-21  
**Last updated:** 2026-07-21

---

## Architecture notes

| Layer | Location | Status |
|-------|----------|--------|
| Admin Blade screens | `resources/views/screens/admin/` | Partial (dashboard only) |
| Cuba layout shell | `resources/views/layouts/admin/` | Exists — needs wiring fixes |
| Admin React | `resources/js/components/admin/` | Empty (scaffold only) |
| Admin CSS/JS (app) | `resources/css/admin/`, `resources/js/admin/` | Added with Dashboard |
| Cuba static assets | `public/assets/admin/` | Present |
| CMS sidebar modules | `cms_modules` + `cms_module_permissions` | Seeded; most routes missing |
| Auth | Laravel Breeze | Exists; `/admin` was unprotected |

**Seeded sidebar modules:** Dashboard, Slider

**Not seeded / not present:** Roles UI, Permissions UI, Settings, Users, Products, Orders, Blogs, Customers, Pages, Media, Reports, Notifications, Activity Logs (as modules), SEO, Integrations, Email Settings.

---

## Module audit table

| Module | Route | Status | Issues | Priority | Files |
|--------|-------|--------|--------|----------|-------|
| Admin Layout (master) | — | Completed | Duplicate CSS removed; CSRF/title; flash alerts; Vite admin assets | High | `layouts/admin/*` |
| Sidebar | — | Completed | Logo route; active states; empty fallback; keyboard back-btn | High | `partials/sidebar.blade.php`, `sidebarHelper.php` |
| Header | — | Completed | Auth user; profile/logout; theme toggle kept | High | `partials/header.blade.php` |
| Breadcrumbs | — | Completed | Yield-driven title/crumbs; asset sprite | Medium | `partials/bread_crumbs.blade.php` |
| Footer | — | Completed | App name + year | Low | `partials/footer.blade.php` |
| Dashboard | `admin.dashboard` (`/admin`) | Completed | Controller + auth; asset paths; real KPI stats; property CTA; page-scoped scripts | Critical | `Admin\DashboardController`, `screens/admin/dashboard/*` |
| Authentication | `login`, `logout`, etc. | Needs Review | Breeze works; login still redirects to Breeze `dashboard` (not admin); `/admin` now requires auth | High | `routes/auth.php`, Auth controllers, `auth/*` views |
| Users | `users.index` (seeded) | Cancelled | Removed from sidebar per product scope | — | — |
| Categories (product) | `product-categories.index` | Cancelled | Removed with Products module | — | — |
| Products | `products.index` | Cancelled | Removed from sidebar | — | — |
| Orders | `orders.index` | Cancelled | Removed from sidebar | — | — |
| Blog categories | `blog-categories.index` | Cancelled | Removed with Blogs module | — | — |
| Blogs / Posts | `blogs.index` | Cancelled | Removed from sidebar | — | — |
| Slider | `admin.sliders.*` | Completed | Admin CRUD; homepage hero reads active slides | High | `SliderController`, `sliders` table, hero |
| Roles | — | Pending | No module/routes; `config/roles.php` only; role is string column on users | High | `config/roles.php`, `User` model |
| Permissions | CMS permissions | Pending | DB + seeder only; no admin UI to manage | High | `CmsModulePermission`, seeders |
| Settings | — | Pending | Not seeded; no pages | Medium | — |
| Customers | — | Pending | Not seeded; demo only on dashboard table | Medium | — |
| Pages | — | Pending | Not present | Low | — |
| Media | — | Pending | Not present | Medium | — |
| Reports | — | Pending | Charts are Cuba demo JS only | Low | `public/assets/admin/js/dashboard/default.js` |
| Notifications | — | Pending | Cuba notify scripts load globally; no app notifications | Low | `layouts/admin/partials/scripts.blade.php` |
| Activity Logs | — | Pending | Demo timeline on dashboard only | Low | dashboard partials |
| Profile | `profile.edit` (Breeze) | Needs Review | Exists under Breeze layout, not Cuba admin chrome | Medium | `ProfileController`, `profile/*` |
| Account Settings | — | Pending | Header links to dead HTML | Medium | header |
| System Settings | — | Pending | Not present | Low | — |
| Email Settings | — | Pending | Not present | Low | — |
| SEO | — | Pending | Not present | Low | — |
| Integrations | — | Pending | Not present | Low | — |
| Contact inquiries | — | Pending | Public form logs only; no admin module/DB | Medium | `ContactController` |
| Property / Listing CMS | — | Pending | Content in `config/property.php` only | Medium | `config/property.php` |

---

## Dashboard CRUD checklist

| Capability | Status | Notes |
|------------|--------|-------|
| Listing | N/A | Dashboard is read-only overview |
| Search / Filter / Sort / Pagination | N/A | |
| Create / Edit / Update / Delete | N/A | |
| Widgets | Fixing | Broken assets; hardcoded welcome user |
| Charts | Fixing | ApexCharts IDs present; scripts need page-scoped load |
| Tables | Fixing | Relative image paths; DataTables init via Cuba JS |
| Auth gate | Fixing | Must require `auth` |
| Success / error flash | Pending | Layout should surface session flashes |

---

## Module completion order

1. **Dashboard** (+ shared layout/sidebar/header) — current
2. Authentication
3. Users
4. Roles & Permissions
5. Settings
6. Categories
7. Products
8. Orders
9. Customers
10. Blog
11. Pages
12. Media
13. Reports
14. Notifications
15. Remaining custom (Contact inquiries, Property CMS, etc.)

---

## Change log

| Date | Module | Summary |
|------|--------|---------|
| 2026-07-21 | Audit | Created `ADMIN_AUDIT.md` from full admin inspection |
| 2026-07-21 | Dashboard | Layout/header/sidebar/breadcrumbs/assets/auth + KPI wiring; Vite admin assets; feature tests |
| 2026-07-21 | Admin Theme | Frontend brand tokens applied to Cuba via scoped `.admin-panel` theme + themed charts |
