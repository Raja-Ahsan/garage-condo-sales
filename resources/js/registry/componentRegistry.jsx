import { createRoot } from 'react-dom/client';
import { HeroReel } from '../components/web/HeroReel';

const registry = {
    HeroReel,
};

const mounted = new WeakSet();

function parseProps(raw) {
    if (!raw || raw.trim() === '') {
        return {};
    }

    try {
        return JSON.parse(raw);
    } catch (error) {
        console.error('[React Registry] Invalid data-props JSON:', raw, error);
        return {};
    }
}

export function mountReactComponents(root = document) {
    const nodes = root.querySelectorAll('[data-react-component]');

    nodes.forEach((el) => {
        if (mounted.has(el)) {
            return;
        }

        const name = el.getAttribute('data-react-component');
        const Component = registry[name];

        if (!Component) {
            console.error(`[React Registry] Unknown component: "${name}"`);
            return;
        }

        const props = parseProps(el.getAttribute('data-props'));

        try {
            createRoot(el).render(<Component {...props} />);
            mounted.add(el);
        } catch (error) {
            console.error(`[React Registry] Failed to mount "${name}":`, error);
        }
    });
}

export default registry;
