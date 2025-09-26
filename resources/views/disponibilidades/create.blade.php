<!DOCTYPE html>
<html>
<head><title>Crear Disponibilidades</title></head>
<body>
<h1>Crear Disponibilidades</h1>
<form action="{{ route('disponibilidades.store') }}" method="POST">
    @csrf
    <!-- Campos básicos -->
    <input type="text" name="nombre" placeholder="Nombre"><br><br>
    <button type="submit">Guardar</button>
</form>
</body>
</html>
