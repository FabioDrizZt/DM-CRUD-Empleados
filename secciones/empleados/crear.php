<?php require_once('../../bd.php') ;
if($_POST){
/*  print_r($_POST);
    print_r($_FILES); */
    print_r($_FILES['foto']);    // Recolectar los datos del metodo POST
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
    $apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : "";
    $idpuesto = (isset($_POST['puesto'])) ? $_POST['puesto'] : "";
    $fechadeingreso = (isset($_POST['fechadeingreso'])) ? $_POST['fechadeingreso'] : "";
    // Recolectar datos de tipo file (archivo)
    $foto = (isset($_FILES['foto'])) ? $_FILES['foto']['name'] : "";
    $cv = (isset($_FILES['cv'])) ? $_FILES['cv']['name'] : "";
    // Preparar la inserción de los datos
    $sentencia = $conexion->prepare("
        INSERT INTO `tbl_empleados`( `nombre`, `apellido`, `foto`, `cv`, `idpuesto`, `fechadeingreso`) 
        VALUES (:nombre, :apellido, :foto, :cv, :idpuesto, :fechadeingreso)");
    // Asignar valores que vienen del formulario
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":apellido", $apellido);
    $sentencia->bindParam(":idpuesto", $idpuesto);
    $sentencia->bindParam(":fechadeingreso", $fechadeingreso);
    // Tratamiento especial para los archivos
    $fecha = new DateTime();
    $foto = $fecha->getTimestamp()."_".$foto;
    $sentencia->bindParam(":foto", $foto);
    $cv = $fecha->getTimestamp()."_".$cv;
    $sentencia->bindParam(":cv", $cv);
    // Ejecutar la sentencia
    $sentencia->execute();
    // Crear los archivos en nuestro servidor
    if(isset($_FILES['foto'])){
        move_uploaded_file($_FILES['foto']['tmp_name'],'./images/'.$foto);
    }
    if(isset($_FILES['cv'])){
        move_uploaded_file($_FILES['cv']['tmp_name'],'./pdfs/'.$cv);
    }
    // Redirigir al index, una vez creado el nuevo puesto
    header("Location: index.php");
}    
$sentencia = $conexion->prepare("SELECT * FROM `tbl_puestos` ORDER BY nombredelpuesto ");
$sentencia->execute();
$lista_tbl_puestos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
/* echo "<pre>";
print_r($lista_tbl_puestos); */

?>

<?php require_once('../../templates/header.php') ;?>
<div class="card">
    <div class="card-header">Datos del empleado</div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId"
                    placeholder="Ingrese su nombre" />
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellido" aria-describedby="helpId"
                    placeholder="Ingrese su apellido" />
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" class="form-control" name="foto" id="foto" aria-describedby="fileHelpId"
                    accept="image/*" />
            </div>
            <div class="mb-3">
                <label for="cv" class="form-label">CV (PDF:):</label>
                <input type="file" class="form-control" name="cv" id="cv" aria-describedby="fileHelpId" accept=".pdf" />
            </div>
            <div class="mb-3">
                <label for="puesto" class="form-label">Puesto</label>
                <select class="form-select form-select-lg" name="puesto" id="puesto">
                    <option hidden selected>Selecciona uno</option>
                    <?php foreach ($lista_tbl_puestos as $registro) : ?>
                    <option value="<?= $registro['id'] ?>"><?= $registro['nombredelpuesto'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="fechadeingreso" class="form-label">Fecha de ingreso: </label>
                <input type="date" class="form-control" name="fechadeingreso" id="fechadeingreso"
                    aria-describedby="helpId" />
            </div>
            <a name="" id="" class="btn btn-outline-danger" href="index.php" role="button">Cancelar</a>

            <button type="submit" class="btn btn-primary">
                Enviar
            </button>

        </form>

    </div>
</div>


<?php require_once('../../templates/footer.php') ;?>