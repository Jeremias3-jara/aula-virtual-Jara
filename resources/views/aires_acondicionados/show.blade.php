@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Aire Acondicionado</h2>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">{{ $aire->marca }} - {{ $aire->modelo }}</h5>

            <p><strong>Capacidad:</strong> {{ $aire->capacidad }} frigorías</p>
            <p><strong>Estado:</strong> {{ ucfirst($aire->estado) }}</p>
            <p><strong>Fecha de creación:</strong> {{ $aire->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Última actualización:</strong> {{ $aire->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('aires_acondicionados.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('aires_acondicionados.edit', $aire->id) }}" class="btn btn-warning">Editar</a>

        <form action="{{ route('aires_acondicionados.destroy', $aire->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este aire acondicionado?')">
                Eliminar
            </button>
        </form>
    </div>
</div>
@endsection
