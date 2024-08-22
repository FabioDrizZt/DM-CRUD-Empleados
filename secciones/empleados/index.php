<?php require_once('../../bd.php') ;

/* Lógica para la eliminación */
if(isset($_GET['txtID'])){
    // Recolectar los datos del metodo GET
    $id = $_GET['txtID'];
    // Preparar la eliminación de los datos
    $sentencia = $conexion->prepare("DELETE FROM `tbl_empleados` WHERE `id`=:id");
    // Asignar valores que vienen del formulario
    $sentencia->bindParam(":id", $id);
    // Ejecutar la sentencia
    $sentencia->execute();
}

$sentencia = $conexion->prepare("SELECT *, (
    SELECT nombredelpuesto
    FROM tbl_puestos
    WHERE tbl_puestos.id = tbl_empleados.idpuesto
) as puesto FROM `tbl_empleados` ORDER BY id DESC ");
$sentencia->execute();
$lista_tbl_empleados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
/* echo "<pre>";
print_r($lista_tbl_empleados); */
?><?php require_once('../../templates/header.php') ;?>

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
                        <th scope="col">ID</th>
                        <th scope="col">Nombre y Apellido</th>
                        <th scope="col">Foto</th>
                        <th scope="col">CV</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Fecha de Ingreso</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_tbl_empleados as $registro) : ?>
                    <tr class="">
                        <td scope="row"><?= $registro['id'] ?></td>
                        <td><?= $registro['nombre'] .  ', ' . $registro['apellido'] ?></td>
                        <td><?= $registro['foto'] ?></td>
                        <td><?= $registro['cv'] ?></td>
                        <td><?= $registro['puesto'] ?></td>
                        <td><?= $registro['fechadeingreso'] ?></td>
                        <td>
                            <a name="" id="" class="btn btn-outline-success" href="carta.php" role="button">Carta📨</a>
                            <a name="" id="" class="btn btn-outline-info" href="editar.php?txtID=<?= $registro['id'] ?>"
                                role="button">Editar🖊</a>
                            <a name="" id="" class="btn btn-outline-danger"
                                href="index.php?txtID=<?= $registro['id'] ?>" role="button">Eliminar❌</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php require_once('../../templates/footer.php') ;?>