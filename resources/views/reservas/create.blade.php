@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">➕ Crear Reserva</h4>
        </div>
        <div class="card-body">
            
            {{-- Mostrar errores de validación --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('reservas.store') }}" method="POST">
                @csrf

                {{-- Usuario --}}
                <div class="mb-3">
                    <label for="usuario_id" class="form-label">Usuario</label>
                    <select name="usuario_id" id="usuario_id" 
                            class="form-select @error('usuario_id') is-invalid @enderror" required>
                        <option value="">-- Selecciona un usuario --</option>
                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}>
                                {{ $usuario->nombre ?? $usuario->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('usuario_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Recurso --}}
                <div class="mb-3">
                    <label for="recurso_id" class="form-label">Recurso</label>
                    <select name="recurso_id" id="recurso_id" 
                            class="form-select @error('recurso_id') is-invalid @enderror" required>
                        <option value="">-- Selecciona un recurso --</option>
                        @foreach($recursos as $recurso)
                            <option value="{{ $recurso->id }}" {{ old('recurso_id') == $recurso->id ? 'selected' : '' }}>
                                {{ $recurso->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('recurso_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Fecha --}}
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" name="fecha" id="fecha" 
                           class="form-control @error('fecha') is-invalid @enderror"
                           value="{{ old('fecha') }}" required>
                    @error('fecha')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Hora inicio --}}
                <div class="mb-3">
                    <label for="hora_inicio" class="form-label">Hora de inicio</label>
                    <input type="time" name="hora_inicio" id="hora_inicio" 
                           class="form-control @error('hora_inicio') is-invalid @enderror"
                           value="{{ old('hora_inicio') }}" required>
                    @error('hora_inicio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Hora fin --}}
                <div class="mb-3">
                    <label for="hora_fin" class="form-label">Hora de fin</label>
                    <input type="time" name="hora_fin" id="hora_fin" 
                           class="form-control @error('hora_fin') is-invalid @enderror"
                           value="{{ old('hora_fin') }}" required>
                    @error('hora_fin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('reservas.index') }}" class="btn btn-secondary">⬅️ Volver</a>
                    <button type="submit" class="btn btn-success">💾 Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
