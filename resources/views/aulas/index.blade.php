@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Listado de Aulas</h1>

    {{-- Botón para crear nueva aula --}}
    <a href="{{ route('aulas.create') }}" class="btn btn-success mb-3">➕ Nueva Aula</a>

    {{-- Tabla de aulas --}}
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Capacidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($aulas as $aula)
                <tr>
                    <td>{{ $aula->id }}</td>
                    <td>{{ $aula->nombre }}</td>
                    <td>{{ $aula->capacidad }}</td>
                    <td>
                        {{-- Botón Ver --}}
                        <a href="{{ route('aulas.show', $aula->id) }}" class="btn btn-info btn-sm">👁 Ver</a>

                        {{-- Botón Editar --}}
                        <a href="{{ route('aulas.edit', $aula->id) }}" class="btn btn-warning btn-sm">✏ Editar</a>

                        {{-- Botón Eliminar --}}
                        <form action="{{ route('aulas.destroy', $aula->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta aula?')">🗑 Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No hay aulas registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
