@extends('layouts.app')

@section('title', 'Docentes')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">👨‍🏫 Docentes</h1>
        <a href="{{ route('docentes.create') }}" class="btn btn-primary">
            ➕ Crear Docente
        </a>
    </div>

    @if($docentes->isEmpty())
        <div class="alert alert-info">
            No hay docentes registrados todavía.
        </div>
    @else
        <table class="table table-striped table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($docentes as $docente)
                    <tr>
                        <td>{{ $docente->id }}</td>
                        <td>{{ $docente->nombre }}</td>
                        <td>{{ $docente->email }}</td>
                        <td>{{ $docente->telefono }}</td>
                        <td>
                            <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                            <form action="{{ route('docentes.destroy', $docente) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este docente?')">🗑 Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
