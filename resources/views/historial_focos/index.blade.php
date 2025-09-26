<!DOCTYPE html>
<html>
<head><title>Historial_focos</title></head>
<body>
<h1>Historial_focos</h1>
<a href="{{ route('historial_focos.create') }}">Crear nuevo</a>
<ul>
@foreach ($historial_focos as $historial_foco)
    <li>@if(isset($historial_foco->nombre)) {{$historial_foco->nombre}} @else ID: {{$historial_foco->id}} @endif</li>
@endforeach
</ul>
</body>
</html>
