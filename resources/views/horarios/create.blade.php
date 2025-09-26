@extends('layouts.app') {{-- Usa tu layout si lo tienes --}}

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">➕ Crear Horario</h4>
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

            <form action="{{ route('horarios.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="materia" class="form-label">Materia</label>
                    <input type="text" name="materia" id="materia" 
                           class="form-control @error('materia') is-invalid @enderror"
                           value="{{ old('materia') }}" required>
                    @error('materia')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="dia" class="form-label">Día</label>
                    <select name="dia" id="dia" 
                            class="form-select @error('dia') is-invalid @enderror" required>
                        <option value="">-- Selecciona un día --</option>
                        <option value="Lunes" {{ old('dia') == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                        <option value="Martes" {{ old('dia') == 'Martes' ? 'selected' : '' }}>Martes</option>
                        <option value="Miércoles" {{ old('dia') == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
                        <option value="Jueves" {{ old('dia') == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                        <option value="Viernes" {{ old('dia') == 'Viernes' ? 'selected' : '' }}>Viernes</option>
                    </select>
                    @error('dia')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- CORREGIDO: campo hora_inicio --}}
                <div class="mb-3">
                    <label for="hora_inicio" class="form-label">Hora de Inicio</label>
                    <input type="time" name="hora_inicio" id="hora_inicio" 
                           class="form-control @error('hora_inicio') is-invalid @enderror"
                           value="{{ old('hora_inicio') }}" required>
                    @error('hora_inicio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- OPCIONAL: campo hora_fin si lo necesitas --}}
                <div class="mb-3">
                    <label for="hora_fin" class="form-label">Hora de Fin</label>
                    <input type="time" name="hora_fin" id="hora_fin" 
                           class="form-control @error('hora_fin') is-invalid @enderror"
                           value="{{ old('hora_fin') }}">
                    @error('hora_fin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('horarios.index') }}" class="btn btn-secondary">⬅️ Volver</a>
                    <button type="submit" class="btn btn-success">💾 Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
