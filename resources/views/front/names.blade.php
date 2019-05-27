@php
    echo date('y-m-d h:i:s');
@endphp
<br>
@foreach ($name as $item)
    {{ $item }}    <br>
@endforeach
