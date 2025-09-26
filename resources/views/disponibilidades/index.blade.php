<!DOCTYPE html>
<html>
<head><title>Disponibilidades</title></head>
<body>
<h1>Disponibilidades</h1>
<a href="{{ route('disponibilidades.create') }}">Crear nuevo</a>
<ul>
@foreach ($disponibilidades as $disponibilidade)
    <li>@if(isset($disponibilidade->nombre)) {{$disponibilidade->nombre}} @else ID: {{$disponibilidade->id}} @endif</li>
@endforeach
</ul>
</body>
</html>
