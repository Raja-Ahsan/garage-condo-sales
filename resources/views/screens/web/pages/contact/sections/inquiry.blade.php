<section class="container-lux pt-16 grid md:grid-cols-12 gap-12">
    <div class="md:col-span-5">
        <p class="eyebrow">Private Inquiries</p>
        <h1 class="mt-6 text-4xl md:text-5xl">
            Book a <span class="gold-text">Private Tour</span> or Consultation.
        </h1>
        <p class="mt-6 text-muted-foreground leading-relaxed">
            Inquiries are handled directly by the owner. Serious buyers, their
            advisors and qualified investors are welcome to request a private
            walk-through or a confidential information package.
        </p>

        <div class="mt-10 space-y-6">
            <div>
                <p class="text-[11px] uppercase tracking-[0.3em] text-muted-foreground">Owner</p>
                <p class="mt-1 text-lg">{{ $contact['name'] }}</p>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-[0.3em] text-muted-foreground">Direct</p>
                <p class="mt-1 text-lg">
                    <a href="{{ $contact['phone_href'] }}" class="hover:text-primary transition">{{ $contact['phone'] }}</a>
                </p>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-[0.3em] text-muted-foreground">Email</p>
                <p class="mt-1 text-lg">
                    <a href="mailto:{{ $contact['email'] }}" class="hover:text-primary transition">{{ $contact['email'] }}</a>
                </p>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-[0.3em] text-muted-foreground">Property</p>
                <p class="mt-1 text-lg">{{ $property['address'] }}</p>
            </div>
        </div>

        <div class="mt-10 card-lux p-6">
            <p class="text-xs uppercase tracking-[0.25em] text-primary">Prefer a Calendar?</p>
            <p class="mt-3 text-sm text-muted-foreground">
                A scheduling widget can be embedded here (Calendly / Google
                Appointments). For now, tours are booked directly by phone or
                email — typically within 24 hours.
            </p>
            <a href="{{ $contact['phone_href'] }}" class="btn-ghost-lux mt-6">Call to Schedule</a>
        </div>
    </div>

    <form
        method="POST"
        action="{{ route('web.contact.store') }}"
        class="md:col-span-7 card-lux p-8 md:p-10 space-y-5"
        x-data="{ submitting: false }"
        @submit="submitting = true"
    >
        @csrf

        <p class="eyebrow">Request Information</p>
        <h2 class="text-2xl md:text-3xl">Tell us a little about your interest.</h2>

        <div class="grid md:grid-cols-2 gap-4 pt-2">
            <div>
                <label for="name" class="text-xs uppercase tracking-[0.25em] text-muted-foreground">Full Name</label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    required
                    value="{{ old('name') }}"
                    class="mt-2 w-full bg-surface/60 border border-border rounded-sm px-4 py-3 text-sm focus:outline-none focus:border-primary transition"
                >
                @error('name')
                    <p class="mt-1 text-xs text-destructive">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="text-xs uppercase tracking-[0.25em] text-muted-foreground">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    required
                    value="{{ old('email') }}"
                    class="mt-2 w-full bg-surface/60 border border-border rounded-sm px-4 py-3 text-sm focus:outline-none focus:border-primary transition"
                >
                @error('email')
                    <p class="mt-1 text-xs text-destructive">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="phone" class="text-xs uppercase tracking-[0.25em] text-muted-foreground">Phone</label>
                <input
                    id="phone"
                    name="phone"
                    type="tel"
                    value="{{ old('phone') }}"
                    class="mt-2 w-full bg-surface/60 border border-border rounded-sm px-4 py-3 text-sm focus:outline-none focus:border-primary transition"
                >
                @error('phone')
                    <p class="mt-1 text-xs text-destructive">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="use" class="text-xs uppercase tracking-[0.25em] text-muted-foreground">Intended Use</label>
                <input
                    id="use"
                    name="use"
                    type="text"
                    placeholder="Collector · Studio · Investment"
                    value="{{ old('use') }}"
                    class="mt-2 w-full bg-surface/60 border border-border rounded-sm px-4 py-3 text-sm focus:outline-none focus:border-primary transition"
                >
                @error('use')
                    <p class="mt-1 text-xs text-destructive">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="message" class="text-xs uppercase tracking-[0.25em] text-muted-foreground">Message</label>
            <textarea
                id="message"
                name="message"
                rows="5"
                placeholder="Share timing, interest level, or specific questions."
                class="mt-2 w-full bg-surface/60 border border-border rounded-sm px-4 py-3 text-sm focus:outline-none focus:border-primary transition"
            >{{ old('message') }}</textarea>
            @error('message')
                <p class="mt-1 text-xs text-destructive">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-wrap items-center gap-4">
            <button
                type="submit"
                class="btn-gold btn-gold-hover"
                :disabled="submitting"
                :class="{ 'opacity-70 pointer-events-none': submitting }"
            >
                Request Consultation
            </button>
            @if (session('success'))
                <p class="text-xs uppercase tracking-[0.2em] text-primary">{{ session('success') }}</p>
            @endif
        </div>
        <p class="text-[11px] text-muted-foreground pt-2">Your information is used only to respond to this inquiry.</p>
    </form>
</section>
