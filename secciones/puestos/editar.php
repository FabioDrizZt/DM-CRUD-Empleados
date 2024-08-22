<?php require_once('../../bd.php') ;
if(isset($_GET['txtID'])){
    $id =$_GET['txtID'];
    $sentencia = $conexion->prepare("SELECT nombredelpuesto FROM `tbl_puestos` WHERE id=:id");
    $sentencia->bindParam(":id", $id);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    $nombredelpuesto = $registro['nombredelpuesto'];
}
if($_POST){
    // print_r($_POST);
    // Recolectar los datos del metodo POST
    $id =(isset($_POST['id'])) ? $_POST['id'] : "";
    $nombredelpuesto = (isset($_POST['nombredelpuesto'])) ? $_POST['nombredelpuesto'] : "";
    // Preparar la actualización o modificación de los datos
    $sentencia = $conexion->prepare("UPDATE `tbl_puestos` SET `nombredelpuesto`=:nombredelpuesto WHERE `id`=:id");
    // Asignar valores que vienen del formulario
    $sentencia->bindParam(":nombredelpuesto", $nombredelpuesto);
    $sentencia->bindParam(":id", $id);
    // Ejecutar la sentencia
    $sentencia->execute();
    // Redirigir al index, una vez creado el nuevo puesto
    header("Location: index.php");
}
?>
<?php require_once('../../templates/header.php') ;?>
<div class="card">
    <div class="card-header">Datos del puesto</div>
    <div class="card-body">
        <form action="" method="post">
            <input type="hidden" name="id" value=<?=$_GET['txtID'];?>>
            <div class="mb-3">
                <label for="nombredelpuesto" class="form-label">Nombre del puesto:</label>
                <input type="text" class="form-control" name="nombredelpuesto" id="nombredelpuesto"
                    aria-describedby="helpId" placeholder="Ingrese nombre del puesto" value="<?= $nombredelpuesto ?>" />
            </div>
            <a name="" id="" class="btn btn-outline-danger" href="index.php" role="button">Cancelar</a>

            <button type="submit" class="btn btn-primary">
                Enviar
            </button>
        </form>
    </div>
</div>

<?php require_once('../../templates/footer.php') ;?>