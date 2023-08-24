@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
    <img src="{{ asset('img/logo-dark.png')}}" class="logo" alt="">
@if (trim($slot) === 'Laravel')
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
