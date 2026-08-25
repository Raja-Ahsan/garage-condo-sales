/**
 * Admin panel chrome — sidebar, theme, loader, profile menu.
 */

const ADMIN_CHART_PRIMARY = '#d9b678';
const ADMIN_CHART_SECONDARY = '#a9aeb8';
const ADMIN_CHART_SUCCESS = '#2f9e8f';

function applyBrandToCubaConfig() {
    window.CubaAdminConfig = {
        ...(window.CubaAdminConfig || {}),
        primary: ADMIN_CHART_PRIMARY,
        secondary: ADMIN_CHART_SECONDARY,
        success: ADMIN_CHART_SUCCESS,
    };
}

function hideLoader() {
    document.querySelectorAll('.loader-wrapper').forEach((el) => {
        el.classList.add('is-hidden');
    });
}

function isMobile() {
    return window.matchMedia('(max-width: 991.98px)').matches;
}

function bindSidebar() {
    const wrapper = document.getElementById('pageWrapper');
    if (!wrapper) {
        return;
    }

    const closeMobile = () => wrapper.classList.remove('sidebar-open');

    document.querySelectorAll('[data-sidebar-toggle]').forEach((el) => {
        el.addEventListener('click', (event) => {
            event.preventDefault();
            if (isMobile()) {
                wrapper.classList.toggle('sidebar-open');
                wrapper.classList.remove('close_icon');
            } else {
                wrapper.classList.toggle('close_icon');
                wrapper.classList.remove('sidebar-open');
            }
        });

        el.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                el.click();
            }
        });
    });

    document.querySelectorAll('[data-sidebar-dismiss]').forEach((el) => {
        el.addEventListener('click', closeMobile);
    });

    document.querySelectorAll('[data-submenu-toggle]').forEach((el) => {
        el.addEventListener('click', (event) => {
            event.preventDefault();
            el.closest('.sidebar-list')?.classList.toggle('is-open');
        });
    });
}

function bindThemeToggle() {
    const body = document.body;
    const stored = localStorage.getItem('admin-theme');
    if (stored === 'light') {
        body.classList.remove('dark-only');
    }

    document.querySelectorAll('[data-theme-toggle]').forEach((el) => {
        el.addEventListener('click', () => {
            body.classList.toggle('dark-only');
            localStorage.setItem('admin-theme', body.classList.contains('dark-only') ? 'dark' : 'light');
            const icon = el.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-moon', body.classList.contains('dark-only'));
                icon.classList.toggle('fa-sun', !body.classList.contains('dark-only'));
            }
        });
    });
}

function bindProfileMenu() {
    document.querySelectorAll('.profile-nav').forEach((nav) => {
        const toggle = nav.querySelector('[data-profile-toggle]');
        if (!toggle) {
            return;
        }

        toggle.addEventListener('click', (event) => {
            event.stopPropagation();
            nav.classList.toggle('is-open');
        });
    });

    document.addEventListener('click', () => {
        document.querySelectorAll('.profile-nav.is-open').forEach((nav) => nav.classList.remove('is-open'));
    });
}

function bindTapTop() {
    const tap = document.querySelector('.tap-top');
    if (!tap) {
        return;
    }

    const onScroll = () => {
        tap.classList.toggle('is-visible', window.scrollY > 240);
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    tap.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
}

applyBrandToCubaConfig();

document.addEventListener('DOMContentLoaded', () => {
    applyBrandToCubaConfig();
    hideLoader();
    bindSidebar();
    bindThemeToggle();
    bindProfileMenu();
    bindTapTop();
});

window.addEventListener('load', hideLoader);
