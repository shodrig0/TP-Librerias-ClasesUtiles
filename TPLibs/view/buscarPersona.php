<?php
require_once '../../configLib.php';
include_once 'Estructura/header.php';
?>
<div class="container mt-5 p-4" style="max-width: 600px; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h2 class="text-center text-success mb-4">Buscar Persona</h2>

    <form onsubmit="return validar()" action="./action/actionBuscarPersona.php" method="POST" id="form">
        <div class="mb-3">
            <label for="legajo" class="form-label fw-bold">Número de Legajo</label>
            <input type="text" class="form-control form-control-lg rounded" placeholder="Ej. 452" id="legajo" name="legajo">
        </div>

        <div class="text-danger mb-3" id="msjErrorLegajo"></div>

        <div class="d-flex flex-column align-items-center w-100 gap-3">
            <button class="btn btn-success fs-5 w-50" type="submit">Buscar</button>
            <a href="../index.php" class="btn btn-secondary w-50 fs-5">Volver</a>
        </div>
    </form>
</div>
<?php
include_once '../../Vista/Estructura/footer.php';
?>