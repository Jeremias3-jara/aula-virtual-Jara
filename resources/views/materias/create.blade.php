@extends('layouts.app')

@section('title', 'Crear Materia')

@section('content')
    <h1 class="h4 mb-3">➕ Crear Nueva Materia</h1>

    <form action="{{ route('materias.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Materia</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">✅ Guardar</button>
        <a href="{{ route('materias.index') }}" class="btn btn-secondary">⬅ Volver</a>
    </form>
@endsection
