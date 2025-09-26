@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">📅 Reservas</h2>
        <a href="{{ route('reservas.create') }}" class="btn btn-primary">
            ➕ Crear nueva reserva
        </a>
    </div>

    {{-- Si hay reservas, mostrarlas en tabla --}}
    @if($reservas->count() > 0)
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Recurso</th>
                            <th>Fecha</th>
                            <th>Hora inicio</th>
                            <th>Hora fin</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservas as $reserva)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $reserva->usuario->name ?? 'N/A' }}</td>
                                <td>{{ $reserva->recurso->nombre ?? 'N/A' }}</td>
                                <td>{{ $reserva->fecha }}</td>
                                <td>{{ $reserva->hora_inicio }}</td>
                                <td>{{ $reserva->hora_fin }}</td>
                                <td class="text-center">
                                    <a href="{{ route('reservas.show', $reserva) }}" class="btn btn-info btn-sm">
                                        👁 Ver
                                    </a>
                                    <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning btn-sm">
                                        ✏️ Editar
                                    </a>
                                    <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta reserva?')">
                                            🗑 Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Paginación si la usas --}}
                <div class="mt-3">
                    {{ $reservas->links() }}
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            No hay reservas registradas todavía.  
            <a href="{{ route('reservas.create') }}" class="alert-link">Crea una nueva aquí</a>.
        </div>
    @endif
</div>
@endsection
