@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Aire Acondicionado</h2>

    <form action="{{ route('aires_acondicionados.update', $aire->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" id="marca" class="form-control" value="{{ old('marca', $aire->marca) }}" required>
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control" value="{{ old('modelo', $aire->modelo) }}" required>
        </div>

        <div class="mb-3">
            <label for="capacidad" class="form-label">Capacidad (Frigorías)</label>
            <input type="number" name="capacidad" id="capacidad" class="form-control" value="{{ old('capacidad', $aire->capacidad) }}" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select">
                <option value="activo" {{ old('estado', $aire->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ old('estado', $aire->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                <option value="en reparación" {{ old('estado', $aire->estado) == 'en reparación' ? 'selected' : '' }}>En reparación</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('aires_acondicionados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
