import axios from 'axios';

const api = axios.create({
    baseURL: '/api',
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        Accept: 'application/json',
    },
});

const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    ?.getAttribute('content');

if (csrfToken) {
    api.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;
}

api.interceptors.response.use(
    (response) => response,
    (error) => {
        const status = error.response?.status;

        if (status === 401) {
            console.warn('[API] Unauthorized (401)');
        } else if (status === 403) {
            console.warn('[API] Forbidden (403)');
        } else if (status === 422) {
            console.warn('[API] Validation error (422)', error.response?.data);
        } else if (status >= 500) {
            console.error('[API] Server error', error.response?.data);
        }

        return Promise.reject(error);
    }
);

export default api;
