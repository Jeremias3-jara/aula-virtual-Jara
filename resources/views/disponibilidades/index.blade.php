@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-calendar2-check me-2"></i>Disponibilidades</h4>
            <a href="{{ route('disponibilidades.create') }}" class="btn btn-light btn-sm">
                <i class="bi bi-plus-circle"></i> Crear nueva
            </a>
        </div>

        <div class="card-body">
            @if ($disponibilidades->isEmpty())
                <div class="alert alert-info text-center">
                    <i class="bi bi-info-circle"></i> No hay disponibilidades registradas todavía.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>ID</th>
                                <th>Docente</th>
                                <th>Día</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($disponibilidades as $disp)
                                <tr>
                                    <td>{{ $disp->id }}</td>
                                    <td>{{ $disp->docente->nombre ?? '—' }}</td>
                                    <td>{{ $disp->dia }}</td>
                                    <td>{{ $disp->hora_inicio }}</td>
                                    <td>{{ $disp->hora_fin }}</td>
                                    <td>
                                        <a href="{{ route('disponibilidades.edit', $disp->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('disponibilidades.destroy', $disp->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta disponibilidad?')">
                                                <i class="bi bi-trash"></i>
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
    </div>
</div>
@endsection
