<?php require_once('../../templates/header.php') ;?>
<div class="card">
    <div class="card-header">Datos del usuario</div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario:</label>
                <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                    placeholder="Ingrese su nombre de usuario" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" name="password" id="password"
                    placeholder="Ingrese su contraseña" />
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelpId"
                    placeholder="abc@mail.com" />
            </div>
            <a name="" id="" class="btn btn-outline-danger" href="index.php" role="button">Cancelar</a>

            <button type="submit" class="btn btn-primary">
                Enviar
            </button>
        </form>
    </div>
</div>
<?php require_once('../../templates/footer.php') ;?>