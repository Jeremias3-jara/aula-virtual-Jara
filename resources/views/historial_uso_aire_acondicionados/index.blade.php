<!DOCTYPE html>
<html>
<head><title>Historial_uso_aire_acondicionados</title></head>
<body>
<h1>Historial_uso_aire_acondicionados</h1>
<a href="{{ route('historial_uso_aire_acondicionados.create') }}">Crear nuevo</a>
<ul>
@foreach ($historial_uso_aire_acondicionados as $historial_uso_aire_acondicionado)
    <li>@if(isset($historial_uso_aire_acondicionado->nombre)) {{$historial_uso_aire_acondicionado->nombre}} @else ID: {{$historial_uso_aire_acondicionado->id}} @endif</li>
@endforeach
</ul>
</body>
</html>
