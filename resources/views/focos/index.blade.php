@extends('layouts.app')

@section('title', 'Focos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Focos</h1>
        <a href="{{ route('focos.create') }}" class="btn btn-primary">+ Crear nuevo</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($focos->isEmpty())
        <div class="alert alert-warning">No hay focos registrados.</div>
    @else
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($focos as $foco)
                    <tr>
                        <td>{{ $foco->id }}</td>
                        <td>{{ $foco->nombre }}</td>
                        <td>
                            <span class="badge {{ $foco->estado ? 'bg-success' : 'bg-danger' }}">
                                {{ $foco->estado ? 'Encendido' : 'Apagado' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('focos.edit', $foco) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('focos.destroy', $foco) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este foco?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
