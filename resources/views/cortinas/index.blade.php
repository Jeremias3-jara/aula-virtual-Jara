@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>
            <i class="fas fa-window-maximize text-primary"></i> Cortinas
        </h1>
        <a href="{{ route('cortinas.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear Cortina
        </a>
    </div>

    @if ($cortinas->isEmpty())
        <div class="alert alert-info">
            No hay cortinas registradas todavía.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Aula</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cortinas as $cortina)
                        <tr>
                            <td>{{ $cortina->id }}</td>
                            <td>{{ $cortina->nombre }}</td>
                            <td>{{ $cortina->tipo }}</td>
                            <td>{{ $cortina->estado }}</td>
                            <td>{{ $cortina->aula->nombre ?? 'Sin asignar' }}</td>
                            <td>
                                <a href="{{ route('cortinas.edit', $cortina) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('cortinas.destroy', $cortina) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta cortina?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
