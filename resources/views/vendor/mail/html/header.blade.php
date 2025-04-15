@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('logo.png') }}" class="logo" alt="neuCentrIX Logo" style="max-width: 200px;">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
