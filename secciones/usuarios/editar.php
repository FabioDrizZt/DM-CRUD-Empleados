<?php require_once('../../bd.php') ;
if(isset($_GET['txtID'])){
    $id =$_GET['txtID'];
    $sentencia = $conexion->prepare("SELECT usuario,password,correo FROM `tbl_usuarios` WHERE id=:id");
    $sentencia->bindParam(":id", $id);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    $usuario = $registro['usuario'];
    $password = $registro['password'];
    $correo = $registro['correo'];
}
if($_POST){
    // print_r($_POST);
    // Recolectar los datos del metodo POST
    $id =(isset($_POST['id'])) ? $_POST['id'] : "";
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "";
    $password = (isset($_POST['password'])) ? $_POST['password'] : "";
    $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "";
    // Preparar la actualización o modificación de los datos
    $sentencia = $conexion->prepare("UPDATE `tbl_usuarios` SET `usuario`=:usuario,`password`=:password,`correo`=:correo WHERE `id`=:id");
    // Asignar valores que vienen del formulario
    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":password", $password);
    $sentencia->bindParam(":correo", $correo);
    $sentencia->bindParam(":id", $id);
    // Ejecutar la sentencia
    $sentencia->execute();
    // Redirigir al index, una vez creado el nuevo puesto
    header("Location: index.php");
}
?>
<?php require_once('../../templates/header.php') ;?>
<div class="card">
    <div class="card-header">Datos del usuario</div>
    <div class="card-body">
        <form action="" method="post">
            <input type="hidden" name="id" value=<?=$_GET['txtID'];?>>

            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario:</label>
                <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId"
                    placeholder="Ingrese su nombre de usuario" value="<?= $usuario ?> " />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" name="password" id="password"
                    placeholder="Ingrese su contraseña" value="<?= $password ?> " />
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelpId"
                    placeholder="abc@mail.com" value="<?= $correo ?> " />
            </div>
            <a name="" id="" class="btn btn-outline-danger" href="index.php" role="button">Cancelar</a>

            <button type="submit" class="btn btn-primary">
                Enviar
            </button>
        </form>
    </div>
</div>
<?php require_once('../../templates/footer.php') ;?>