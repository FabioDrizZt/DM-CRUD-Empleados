<?php require_once('../../templates/header.php') ;?>
<div class="card">
    <div class="card-header">
        <h1>Usuarios</h1>
        <a name="" id="" class="btn btn-success" href="crear.php" role="button">Agregar registro</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="">
                        <td scope="row">1</td>
                        <td>juanPerez</td>
                        <td>*******</td>
                        <td>juan.perez@gmail.com</td>
                        <td>
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