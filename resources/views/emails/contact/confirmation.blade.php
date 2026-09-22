<x-mail::message>
# Thank you, {{ $inquiry['name'] }}

We received your inquiry about **{{ config('property.name') }}** at {{ config('property.address') }}.

To reach {{ config('mail.to.name') }}, email [{{ config('mail.to.address') }}](mailto:{{ config('mail.to.address') }}) or call {{ config('property.contact.phone') }}.

@if (! empty($inquiry['message']))
**Your message**

{{ $inquiry['message'] }}
@endif

<x-mail::button :url="config('app.url')">
View the listing
</x-mail::button>

{{ config('mail.to.name') }}<br>
{{ config('property.name') }}
</x-mail::message>
