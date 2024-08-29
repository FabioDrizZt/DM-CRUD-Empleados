<?php $url_base = 'http://localhost/app/' ?>
<!doctype html>
<html lang="es">

<head>
    <title>CRUD Empleados</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- Jquery v.3.7.1 -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- CSS DataTables  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" />
    <!-- JS DataTables  -->
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
</head>

<body>
    <div class="container">
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
            </div>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?= $url_base;?>index.php" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="<?= $url_base;?>secciones/empleados/" class="nav-link px-2">Empleados</a></li>
                <li><a href="<?= $url_base;?>secciones/puestos/" class="nav-link px-2">Puestos</a></li>
                <li><a href="<?= $url_base;?>secciones/usuarios/" class="nav-link px-2">Usuarios</a></li>
                <li><a href="#" class="nav-link px-2">About</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <a href="<?= $url_base;?>login.php" class="btn btn-outline-primary me-2">Iniciar Sesión</a>
                <button type="button" class="btn btn-primary">Registrarse</button>
            </div>
        </header>
    </div>