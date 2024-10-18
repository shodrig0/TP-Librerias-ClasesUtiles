<?php
require_once '../../configLib.php';
include_once 'Estructura/header.php';
?>
<div class="container border rounded p-5 shadow">
    <form onclick="return validar()" action="./action/actionEliminarPersona.php" method="POST" id="form">
        <div class="text-danger fs-4">¿Está segurx de que quiere proceder con la eliminación?</div>
        <label for="legajo" class="fs-4 mt-2 mb-2">Ingrese el legajo nuevamente para corroborar:
        </label>
        <div class="input-group mb-3">
            <input type="text" class="form-control form-control-lg rounded" placeholder="Ej: 12345678" id="legajo" name="legajo">
        </div>
        <div class="d-flex flex-column align-items-center w-100 gap-3">
            <button class="btn btn-danger fs-5 w-50" type="submit">Eliminar</button>
            <a href="../index.php" class="btn btn-secondary w-50 fs-5">Volver al Inicio</a>
        </div>
    </form>
</div>
<?php
include_once '../../Vista/Estructura/footer.php';
?>