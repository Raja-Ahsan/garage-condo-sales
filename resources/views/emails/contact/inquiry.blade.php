<x-mail::message>
# New contact inquiry

A visitor submitted the website form. Their details are below. **Reply to this email** to write them directly.

<x-mail::panel>
**Name:** {{ $inquiry['name'] }}
<br>
**Email:** [{{ $inquiry['email'] }}](mailto:{{ $inquiry['email'] }})
<br>
**Phone:** {{ ! empty($inquiry['phone']) ? $inquiry['phone'] : 'Not provided' }}
<br>
**Intended use:** {{ ! empty($inquiry['use']) ? $inquiry['use'] : 'Not provided' }}
</x-mail::panel>

@if (! empty($inquiry['message']))
**Message**

{{ $inquiry['message'] }}
@endif

<x-mail::button :url="'mailto:'.$inquiry['email'].'?subject='.rawurlencode('Re: Dual Luxury Garage Condos')">
Email {{ $inquiry['name'] }}
</x-mail::button>

{{ config('property.name') }}
</x-mail::message>
