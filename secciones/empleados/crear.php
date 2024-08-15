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
                    <option value="1">Desarrollador FrontEnd</option>
                    <option value="2">Desarrollador BackEnd</option>
                    <option value="3">Desarrollador FullStack</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="fechadeingreso" class="form-label">Fecha de ingreso: </label>
                <input type="date" class="form-control" name="fechadeingreso" id="fechadeingreso"
                    aria-describedby="helpId" />
            </div>
            <a name="" id="" class="btn btn-outline-danger" href="#" role="button">Cancelar</a>

            <button type="submit" class="btn btn-primary">
                Enviar
            </button>

        </form>

    </div>
</div>


<?php require_once('../../templates/footer.php') ;?>