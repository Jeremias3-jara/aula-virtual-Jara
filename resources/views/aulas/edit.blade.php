@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Aula</h2>

    <form action="{{ route('aulas.update', $aula->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="numero" class="form-label">Número de Aula</label>
            <input type="text" name="numero" id="numero" 
                   class="form-control" 
                   value="{{ old('numero', $aula->numero) }}" required>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" 
                   class="form-control" 
                   value="{{ old('nombre', $aula->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="capacidad" class="form-label">Capacidad (alumnos)</label>
            <input type="number" name="capacidad" id="capacidad" 
                   class="form-control" 
                   value="{{ old('capacidad', $aula->capacidad) }}" required>
        </div>

        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" name="ubicacion" id="ubicacion" 
                   class="form-control" 
                   value="{{ old('ubicacion', $aula->ubicacion) }}">
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select">
                <option value="disponible" {{ old('estado', $aula->estado) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="ocupada" {{ old('estado', $aula->estado) == 'ocupada' ? 'selected' : '' }}>Ocupada</option>
                <option value="mantenimiento" {{ old('estado', $aula->estado) == 'mantenimiento' ? 'selected' : '' }}>En mantenimiento</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('aulas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
