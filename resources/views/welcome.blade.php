<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Aulas</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Gestión de Aulas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-hidden="true">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aulas.index') }}">Aulas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('disponibilidades.index') }}">Disponibilidades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('materias.index') }}">Materias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('docentes.index') }}">Docentes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('horarios.index') }}">Horarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reservas.index') }}">Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('focos.index') }}">Focos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cortinas.index') }}">Cortinas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('muebles.index') }}">Muebles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aires_acondicionados.index') }}">Aires Acondicionados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('historial_uso_aire_acondicionados.index') }}">Historial Aire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('historial_focos.index') }}">Historial Focos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="text-center mb-4">Bienvenido al Sistema de Gestión de Aulas</h1>
        <p class="text-center mb-5">Selecciona una opción para administrar los recursos del sistema:</p>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Aulas</h5>
                        <p class="card-text">Administra las aulas disponibles en el sistema.</p>
                        <a href="{{ route('aulas.index') }}" class="btn btn-primary">Ir a Aulas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Disponibilidades</h5>
                        <p class="card-text">Gestiona la disponibilidad de aulas.</p>
                        <a href="{{ route('disponibilidades.index') }}" class="btn btn-primary">Ir a Disponibilidades</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Materias</h5>
                        <p class="card-text">Administra las materias impartidas.</p>
                        <a href="{{ route('materias.index') }}" class="btn btn-primary">Ir a Materias</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Docentes</h5>
                        <p class="card-text">Gestiona la información de los docentes.</p>
                        <a href="{{ route('docentes.index') }}" class="btn btn-primary">Ir a Docentes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Horarios</h5>
                        <p class="card-text">Administra los horarios de clases.</p>
                        <a href="{{ route('horarios.index') }}" class="btn btn-primary">Ir a Horarios</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Reservas</h5>
                        <p class="card-text">Gestiona las reservas de aulas.</p>
                        <a href="{{ route('reservas.index') }}" class="btn btn-primary">Ir a Reservas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Focos</h5>
                        <p class="card-text">Administra los focos en las aulas.</p>
                        <a href="{{ route('focos.index') }}" class="btn btn-primary">Ir a Focos</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Cortinas</h5>
                        <p class="card-text">Gestiona las cortinas en las aulas.</p>
                        <a href="{{ route('cortinas.index') }}" class="btn btn-primary">Ir a Cortinas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Muebles</h5>
                        <p class="card-text">Administra los muebles de las aulas.</p>
                        <a href="{{ route('muebles.index') }}" class="btn btn-primary">Ir a Muebles</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Aires Acondicionados</h5>
                        <p class="card-text">Gestiona los aires acondicionados.</p>
                        <a href="{{ route('aires_acondicionados.index') }}" class="btn btn-primary">Ir a Aires Acondicionados</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Historial de Aire Acondicionado</h5>
                        <p class="card-text">Consulta el historial de uso de aires acondicionados.</p>
                        <a href="{{ route('historial_uso_aire_acondicionados.index') }}" class="btn btn-primary">Ir a Historial Aire</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Historial de Focos</h5>
                        <p class="card-text">Consulta el historial de uso de focos.</p>
                        <a href="{{ route('historial_focos.index') }}" class="btn btn-primary">Ir a Historial Focos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>