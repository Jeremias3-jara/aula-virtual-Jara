<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cortina</title>
    <!-- Bootstrap ya incluido -->
    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            color: #ffffff;
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .form-custom {
            background-color: #16213e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        .form-label {
            color: #d3d3d3;
        }
        .form-control {
            background-color: #1a1a2e;
            color: #ffffff;
            border: 1px solid #0f3460;
        }
        .form-control:focus {
            background-color: #1a1a2e;
            color: #ffffff;
            border-color: #3498db;
            box-shadow: 0 0 5px #3498db;
        }
        .btn-custom {
            background-color: #e94560;
            color: #ffffff;
            border: none;
            padding: 8px 20px;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #ff6b81;
            transform: scale(1.05);
        }
        .alert-custom {
            background-color: #0f3460;
            color: #ffffff;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Editar Cortina</h1>
        @if ($errors->any())
            <div class="alert alert-custom">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-custom">
            <form action="{{ route('cortinas.update', $cortina->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $cortina->nombre) }}" required>
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <input type="text" name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror" value="{{ old('tipo', $cortina->tipo) }}">
                    @error('tipo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado" id="estado" class="form-select @error('estado') is-invalid @enderror" required>
                        <option value="" disabled>Seleccione un estado</option>
                        <option value="1" {{ old('estado', $cortina->estado ? '1' : '0') == '1' ? 'selected' : '' }}>Abierto</option>
                        <option value="0" {{ old('estado', $cortina->estado ? '1' : '0') == '0' ? 'selected' : '' }}>Cerrado</option>
                    </select>
                    @error('estado')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="aula_id" class="form-label">Aula</label>
                    <select name="aula_id" id="aula_id" class="form-select @error('aula_id') is-invalid @enderror" required>
                        <option value="" disabled>Seleccione un aula</option>
                        @foreach ($aulas as $aula)
                            <option value="{{ $aula->id }}" {{ old('aula_id', $cortina->aula_id) == $aula->id ? 'selected' : '' }}>{{ $aula->nombre }}</option>
                        @endforeach
                    </select>
                    @error('aula_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-custom">Guardar Cambios</button>
                <a href="{{ route('cortinas.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>