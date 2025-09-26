@extends('layouts.app')

@section('title', 'Materias')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">📚 Materias</h1>
        <a href="{{ route('materias.create') }}" class="btn btn-primary">
            ➕ Crear Materia
        </a>
    </div>

    @if($materias->isEmpty())
        <div class="alert alert-info">
            No hay materias registradas todavía.
        </div>
    @else
        <table class="table table-striped table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materias as $materia)
                    <tr>
                        <td>{{ $materia->id }}</td>
                        <td>{{ $materia->nombre }}</td>
                        <td>
                            <a href="{{ route('materias.edit', $materia) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                            <form action="{{ route('materias.destroy', $materia) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta materia?')">🗑 Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
