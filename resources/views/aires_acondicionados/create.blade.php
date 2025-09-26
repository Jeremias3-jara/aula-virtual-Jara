<!DOCTYPE html>
<html>
<head><title>Crear Aires_acondicionados</title></head>
<body>
<h1>Crear Aires_acondicionados</h1>
<form action="{{ route('aires_acondicionados.store') }}" method="POST">
    @csrf
    <!-- Campos básicos -->
    <input type="text" name="nombre" placeholder="Nombre"><br><br>
    <button type="submit">Guardar</button>
</form>
</body>
</html>
