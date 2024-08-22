<?php require_once('../../bd.php') ;
if($_POST){
    // print_r($_POST);
    // Recolectar los datos del metodo POST
    $nombredelpuesto = (isset($_POST['nombredelpuesto'])) ? $_POST['nombredelpuesto'] : "";
    // Preparar la inserción de los datos
    $sentencia = $conexion->prepare("INSERT INTO tbl_puestos(`nombredelpuesto`) VALUES (:nombredelpuesto)");
    // Asignar valores que vienen del formulario
    $sentencia->bindParam(":nombredelpuesto", $nombredelpuesto);
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
            <div class="mb-3">
                <label for="nombredelpuesto" class="form-label">Nombre del puesto:</label>
                <input type="text" class="form-control" name="nombredelpuesto" id="nombredelpuesto"
                    aria-describedby="helpId" placeholder="Ingrese nombre del puesto" />
            </div>
            <a name="" id="" class="btn btn-outline-danger" href="index.php" role="button">Cancelar</a>

            <button type="submit" class="btn btn-primary">
                Enviar
            </button>
        </form>
    </div>
</div>

<?php require_once('../../templates/footer.php') ;?>