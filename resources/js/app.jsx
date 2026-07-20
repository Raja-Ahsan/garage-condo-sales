import './bootstrap';
import Alpine from 'alpinejs';
import { mountReactComponents } from './registry/componentRegistry';

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    mountReactComponents();
});
