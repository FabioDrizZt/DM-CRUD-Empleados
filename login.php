<?php include_once('./bd.php') ;
session_start();
if ($_POST) {
  $sentencia = $conexion->prepare("SELECT * 
  FROM `tbl_usuarios`
  WHERE usuario=:usuario
  AND password=:password "); // Traer datos desde la BD
  $sentencia->bindParam(":usuario", $_POST['usuario']);
  $sentencia->bindParam(":password", $_POST['password']);
  $sentencia->execute(); // Ejecutar la consulta previamente preparada
  $registro = $sentencia->fetch(PDO::FETCH_LAZY); // Almacenar los datos de manera asociativa
  if ($registro) {
    $_SESSION['usuario'] = $registro['usuario'];
    $_SESSION['logueado'] = true;
    header("Location:index.php");
    } else {
    $mensaje = "Error: El usuario o contraseña es incorrecto.";
  }
}
?>
<?php include_once('./templates/header.php') ;?>

<main>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <?php if (isset($mensaje)) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Error</strong> <?= $mensaje ?>
        </div>
        <?php endif ?>
        <div class="row align-items-center g-lg-5 py-5">

            <div class="col-md-10 mx-auto col-lg-5">
                <form method='POST' class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                    <div class="form-floating mb-3">
                        <input type="text" name="usuario" class="form-control" id="floatingInput"
                            placeholder="Ingrese Usuario">
                        <label for="floatingInput">Usuario</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword"
                            placeholder="Ingrese Contraseña">
                        <label for="floatingPassword">Contraseña</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar Sesión</button>
                    <hr class="my-4">
                </form>
            </div>
        </div>
    </div>
</main>
<?php include_once('./templates/footer.php') ;?>