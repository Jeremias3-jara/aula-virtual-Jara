<!DOCTYPE html>
<html>
<head><title>Aires_acondicionados</title></head>
<body>
<h1>Aires_acondicionados</h1>
<a href="{{ route('aires_acondicionados.create') }}">Crear nuevo</a>
<ul>
@foreach ($aires_acondicionados as $aires_acondicionado)
    <li>@if(isset($aires_acondicionado->nombre)) {{$aires_acondicionado->nombre}} @else ID: {{$aires_acondicionado->id}} @endif</li>
@endforeach
</ul>
</body>
</html>
