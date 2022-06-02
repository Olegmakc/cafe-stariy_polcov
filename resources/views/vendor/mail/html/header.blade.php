<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{Storage::url('logo/logo.jpg')}}" class="logo" alt="Stariy polcovnuk logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
