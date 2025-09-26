@extends('layouts.app') {{-- Usa tu layout si lo tienes --}}

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">📅 Horarios</h1>
        <a href="{{ route('horarios.create') }}" class="btn btn-primary">
            ➕ Crear nuevo
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($horarios->count() > 0)
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Materia</th>
                            <th scope="col">Día</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($horarios as $horario)
                            <tr>
                                <td>{{ $horario->id }}</td>
                                <td>{{ $horario->materia }}</td>
                                <td>{{ $horario->dia }}</td>
                                <td>{{ $horario->hora }}</td>
                                <td>
                                    <a href="{{ route('horarios.edit', $horario) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                                    <form action="{{ route('horarios.destroy', $horario) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Seguro que quieres eliminar este horario?')">
                                            🗑️ Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            No hay horarios cargados todavía.
        </div>
    @endif
</div>
@endsection
