<?php require_once('../../templates/header.php') ;?>

<div class="card">
    <div class="card-header">
        <h1>Empleados</h1>
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre y Apellido</th>
                        <th scope="col">Foto</th>
                        <th scope="col">CV</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Fecha de Ingreso</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row">Fabio, Argañaraz</td>
                        <td>fabio.jpg</td>
                        <td>fabio.pdf</td>
                        <td>Instructor</td>
                        <td>12/12/2020</td>
                        <td>
                            <a name="" id="" class="btn btn-outline-success" href="carta.php" role="button">Carta📨</a>
                            <a name="" id="" class="btn btn-outline-info" href="editar.php" role="button">Editar🖊</a>
                            <a name="" id="" class="btn btn-outline-danger" href="#" role="button">Eliminar❌</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
</div>

<?php require_once('../../templates/footer.php') ;?>