@extends('layouts.app')

@section('title', 'Crear Docente')

@section('content')
    <h1 class="h4 mb-3">➕ Crear Nuevo Docente</h1>

    <form action="{{ route('docentes.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Completo</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">✅ Guardar</button>
        <a href="{{ route('docentes.index') }}" class="btn btn-secondary">⬅ Volver</a>
    </form>
@endsection
