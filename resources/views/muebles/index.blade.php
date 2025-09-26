@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>
            <i class="fas fa-couch text-success"></i> Muebles
        </h1>
        <a href="{{ route('muebles.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Crear Mueble
        </a>
    </div>

    @if ($muebles->isEmpty())
        <div class="alert alert-info">
            No hay muebles registrados todavía.
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
                    @foreach ($muebles as $mueble)
                        <tr>
                            <td>{{ $mueble->id }}</td>
                            <td>{{ $mueble->nombre }}</td>
                            <td>{{ $mueble->tipo }}</td>
                            <td>{{ $mueble->estado }}</td>
                            <td>{{ $mueble->aula->nombre ?? 'Sin asignar' }}</td>
                            <td>
                                <a href="{{ route('muebles.edit', $mueble) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('muebles.destroy', $mueble) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este mueble?')">
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
