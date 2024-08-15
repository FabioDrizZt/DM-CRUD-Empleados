<?php require_once('../../bd.php') ;
$sentencia = $conexion->prepare("SELECT * FROM `tbl_puestos` ORDER BY nombredelpuesto");
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
            <table class="table">
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
                            <a name="" id="" class="btn btn-outline-info" href="editar.php" role="button">Editar🖊</a>
                            <a name="" id="" class="btn btn-outline-danger" href="#" role="button">Eliminar❌</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php require_once('../../templates/footer.php') ;?>