@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Aula</h2>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Aula N° {{ $aula->numero }}</h5>

            <p><strong>Nombre:</strong> {{ $aula->nombre }}</p>
            <p><strong>Capacidad:</strong> {{ $aula->capacidad }} alumnos</p>
            <p><strong>Ubicación:</strong> {{ $aula->ubicacion }}</p>
            <p><strong>Estado:</strong> {{ ucfirst($aula->estado) }}</p>

            <p><strong>Fecha de creación:</strong> {{ $aula->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Última actualización:</strong> {{ $aula->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('aulas.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('aulas.edit', $aula->id) }}" class="btn btn-warning">Editar</a>

        <form action="{{ route('aulas.destroy', $aula->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta aula?')">
                Eliminar
            </button>
        </form>
    </div>
</div>
@endsection
