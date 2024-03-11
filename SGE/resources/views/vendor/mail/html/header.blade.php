@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="../../img/logos/logo-utCancún.png" class="logo" alt="SGE Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
