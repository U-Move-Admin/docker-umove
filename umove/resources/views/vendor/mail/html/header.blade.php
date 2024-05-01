<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'UmoveLondon')
<img src="{{ $url }}/img/logo-2.png" class="logo" alt="Umove London Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
