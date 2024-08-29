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
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Vertically centered hero sign-up form
            </h1>
            <p class="col-lg-10 fs-4">Below is an example form built entirely with Bootstrap’s form controls.
                Each required form group has a validation state that can be triggered by attempting to submit
                the form without completing it.</p>
        </div>

    </div>
</main>
<?php include_once('./templates/footer.php') ;?>