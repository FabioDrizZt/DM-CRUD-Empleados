<?php require_once('../../bd.php');
$txtID = $_GET['txtID'];
$sentencia = $conexion->prepare("SELECT *,
(SELECT nombredelpuesto FROM tbl_puestos WHERE tbl_puestos.id=tbl_empleados.idpuesto) as puesto
FROM tbl_empleados WHERE id=:id"); // Traer datos desde la BD
$sentencia->bindParam(":id", $txtID);
$sentencia->execute(); // Ejecutar la consulta previamente preparada
$registro = $sentencia->fetch(PDO::FETCH_LAZY); // Almacenar los datos de manera asociativa
// Traemos los puestos desde la BD
$sentencia = $conexion->prepare("SELECT * FROM `tbl_puestos`"); // Traer datos desde la BD
$sentencia->execute(); // Ejecutar la consulta previamente preparada
$lista_tbl_puestos = $sentencia->fetchAll(PDO::FETCH_ASSOC); // Almacenar los datos de manera asociativa

if ($_POST) {
  //buscamos el nombre de los archivos en la BD
  $sentencia = $conexion->prepare("SELECT `foto`,`cv` FROM `tbl_empleados` WHERE id=:id"); // Traer datos desde la BD
  $sentencia->bindParam(":id", $txtID);
  $sentencia->execute(); // Ejecutar la consulta previamente preparada
  $registro = $sentencia->fetch(PDO::FETCH_LAZY); // Almacenar los datos de manera asociativaz

  //Validamos que los datos hayan sido cargado correctamente
  $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : "");
  $apellido = (isset($_POST['apellido']) ? $_POST['apellido'] : "");
  $foto = (isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : "");
  $cv = (isset($_FILES['cv']['name']) ? $_FILES['cv']['name'] : "");
  $idpuesto = (isset($_POST['idpuesto']) ? $_POST['idpuesto'] : "");
  $id = (isset($_GET['txtID']) ? $_GET['txtID'] : "");
  $sentencia = $conexion->prepare("UPDATE `tbl_empleados` SET 
  nombre=:nombre,
  apellido=:apellido,
  foto=:foto,
  cv=:cv,
  idpuesto=:idpuesto
  WHERE id=:id"); // Traer datos desde la BD

  //generamos un nombre unico
  $fecha = new DateTime();
  $foto = ($foto != '') ? $fecha->getTimestamp() . "_" . $foto : '';
  $cv = ($cv != '') ? $fecha->getTimestamp() . "_" . $cv : '';
  // Guardamos la foto en nuestro servidor
  $tmp_foto = $_FILES['foto']['tmp_name'];
  if ($tmp_foto != '') {
    move_uploaded_file($tmp_foto, './images/' . $foto);
    //preguntamos si existe el nombre de los archivos en la BD
    if (isset($registro["foto"])) {
      if (file_exists('./images/' . $registro["foto"])) { // preguntamos si existe el archivo en el server
        unlink('./images/' . $registro["foto"]); // borramos el archivo del server
      }
    }
  }
  // Guardamos el cv en nuestro servidor
  $tmp_cv = $_FILES['cv']['tmp_name'];
  if ($tmp_cv != '') {
    move_uploaded_file($tmp_cv, './pdfs/' . $cv);
    //preguntamos si existe el nombre de los archivos en la BD
    if (isset($registro["cv"])) {
      if (file_exists('./pdfs/' . $registro["cv"])) { // preguntamos si existe el archivo en el server
        unlink('./pdfs/' . $registro["cv"]); // borramos el archivo del server
      }
    }
  }

  $sentencia->bindParam(":nombre", $nombre);
  $sentencia->bindParam(":apellido", $apellido);
  $sentencia->bindParam(":foto", $foto);
  $sentencia->bindParam(":cv", $cv);
  $sentencia->bindParam(":idpuesto", $idpuesto);
  $sentencia->bindParam(":id", $id);
    // Ejecutar la sentencia
    $sentencia->execute();
    // Redirigir al index, una vez creado el nuevo puesto
    header("Location: index.php");
}
?>
<?php require_once('../../templates/header.php') ;?>
<div class="card">
    <div class="card-header">Datos del empleado</div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value=<?=$_GET['txtID'];?>>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId"
                    placeholder="Ingrese su nombre" value=<?=$registro['nombre']?> />
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellido" aria-describedby="helpId"
                    placeholder="Ingrese su apellido" value=<?=$registro['apellido']?> />
            </div>
            <p>Foto actual</p>
            <img src="./images/<?= $registro['foto'] ?>" width="100" class="img-fluid rounded-top"
                alt="imagen de <?= $registro['nombre'] ?>" />
            <div class="mb-3">
                <label for="foto" class="form-label">Editar Foto:</label>
                <input type="file" class="form-control" name="foto" id="foto" aria-describedby="fileHelpId"
                    accept="image/*" />
            </div>
            <div class="mb-3">
                <label for="cv" class="form-label">CV Actual (PDF:): <a href="./pdfs/<?= $registro['cv'] ?>"
                        target="_blank" rel="noopener noreferrer">
                        CV de <?= $registro['nombre'] ?>
                    </a></label>
                <input type="file" class="form-control" name="cv" id="cv" aria-describedby="fileHelpId" accept=".pdf" />
            </div>
            <div class="mb-3">
                <label for="fechadeingreso" class="form-label">Fecha de ingreso: </label>
                <input type="date" class="form-control" name="fechadeingreso" id="fechadeingreso"
                    aria-describedby="helpId" value=<?=$registro['fechadeingreso']?> />
            </div>
            <div class="mb-3">
                <label for="puesto" class="form-label">Puesto</label>
                <select class="form-select form-select-lg" name="idpuesto" id="puesto">
                    <option selected value="<?= $registro['idpuesto']?>"> <?= $registro['puesto'] ?> </option>
                    <?php foreach ($lista_tbl_puestos as $registro) : ?>
                    <option value="<?= $registro['id'] ?>">
                        <?= $registro['nombredelpuesto'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <a name="" id="" class="btn btn-outline-danger" href="index.php" role="button">Cancelar</a>

            <button type="submit" class="btn btn-primary">
                Enviar
            </button>

        </form>

    </div>
</div>


<?php require_once('../../templates/footer.php') ;?>