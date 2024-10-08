<?php require_once('../../bd.php') ;

/* Lógica para la eliminación */
if(isset($_GET['txtID'])){
    // Recolectar los datos del metodo GET
    $id = $_GET['txtID'];
    // Preparar la eliminación de los datos
    $sentencia = $conexion->prepare("DELETE FROM `tbl_puestos` WHERE `id`=:id");
    // Asignar valores que vienen del formulario
    $sentencia->bindParam(":id", $id);
    // Ejecutar la sentencia
    $sentencia->execute();
}

$sentencia = $conexion->prepare("SELECT * FROM `tbl_puestos` ORDER BY id DESC ");
$sentencia->execute();
$lista_tbl_puestos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
/* echo "<pre>";
print_r($lista_tbl_puestos); */
?>
<?php require_once('../../templates/header.php') ;?>
<div class="card">
    <div class="card-header">
        <h1>Puestos</h1>
        <a name="" id="" class="btn btn-success" href="crear.php" role="button">Agregar registro</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabla_id" class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre del puesto</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_tbl_puestos as $registro) : ?>
                    <tr class="">
                        <td scope="row"> <?= $registro['id'] ?> </td>
                        <td><?= $registro['nombredelpuesto'] ?></td>
                        <td>
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