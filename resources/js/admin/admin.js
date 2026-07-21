/**
 * Admin panel app JS (Cuba assets remain the primary UI scripts).
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

    try {
        localStorage.setItem('primary', ADMIN_CHART_PRIMARY);
        localStorage.setItem('secondary', ADMIN_CHART_SECONDARY);
        localStorage.setItem('success', ADMIN_CHART_SUCCESS);
    } catch {
        // Ignore private-mode storage failures.
    }
}

applyBrandToCubaConfig();

document.addEventListener('DOMContentLoaded', () => {
    applyBrandToCubaConfig();

    document.querySelectorAll('.sidebar-wrapper .back-btn[role="button"]').forEach((el) => {
        el.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                el.click();
            }
        });
    });
});
