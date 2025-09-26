{{-- resources/views/focos/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Crear Foco')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Crear Foco</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('focos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection
