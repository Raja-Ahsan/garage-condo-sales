/**
 * Cinematic Ken-Burns hero slideshow.
 * Photos are passed from Blade via data-props.
 */
export function HeroReel({ photos = [] }) {
    const duration = Math.max(photos.length, 1) * 4;

    return (
        <div className="absolute inset-0 overflow-hidden">
            {photos.map((photo, i) => (
                <div
                    key={photo.key || i}
                    className="hero-slide"
                    style={{
                        backgroundImage: `url(${photo.src})`,
                        animationDelay: `${i * 4}s`,
                        animationDuration: `${duration}s`,
                    }}
                />
            ))}
            {/* Base scrim — keeps bright slides readable */}
            <div className="absolute inset-0 bg-background/55" />
            {/* Stronger left wash behind headline / bullets */}
            <div className="absolute inset-0 bg-gradient-to-r from-background via-background/75 to-background/20" />
            {/* Bottom fade into page */}
            <div className="absolute inset-0 bg-gradient-to-b from-background/50 via-transparent to-background" />
            <div className="absolute inset-0 bg-[radial-gradient(ellipse_at_center,transparent_15%,var(--background)_96%)]" />
            <div
                className="absolute inset-0 opacity-[0.06] pointer-events-none mix-blend-overlay"
                style={{
                    backgroundImage:
                        'repeating-linear-gradient(0deg, rgba(255,255,255,.4) 0 1px, transparent 1px 3px)',
                }}
            />
        </div>
    );
}

export default HeroReel;
