@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Cortina</h2>

    <form action="{{ route('cortinas.update', $cortina->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" 
                   class="form-control" 
                   value="{{ old('nombre', $cortina->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" name="ubicacion" id="ubicacion" 
                   class="form-control" 
                   value="{{ old('ubicacion', $cortina->ubicacion) }}">
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" id="tipo" class="form-select">
                <option value="manual" {{ old('tipo', $cortina->tipo) == 'manual' ? 'selected' : '' }}>Manual</option>
                <option value="automática" {{ old('tipo', $cortina->tipo) == 'automática' ? 'selected' : '' }}>Automática</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select">
                <option value="abierta" {{ old('estado', $cortina->estado) == 'abierta' ? 'selected' : '' }}>Abierta</option>
                <option value="cerrada" {{ old('estado', $cortina->estado) == 'cerrada' ? 'selected' : '' }}>Cerrada</option>
                <option value="averiada" {{ old('estado', $cortina->estado) == 'averiada' ? 'selected' : '' }}>Averiada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('cortinas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
