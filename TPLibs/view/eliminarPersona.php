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
        </div> 
    </form>
    <div class="d-flex flex-column align-items-center w-100 gap-3 mt-3">
        <a href="../index.php" class="btn btn-secondary w-50 fs-5">Volver al Inicio</a>
    </div>
</div>
<!-- <script src="js/validarBusquedaPersona.js"></script> -->
<script type="text/javascript">
    function validar() {
    let verificacion = true;
    let legajoOriginal = sessionStorage.getItem("legajoOriginal");
    let legajo = $("#legajo").val();
    let msjLegajo = $("#msjErrorLegajo");

    if (legajo.trim() === "") {
        agregarError($("#legajo"), msjLegajo, "Ingrese el número de legajo");
        verificacion = false;
    } else if (legajo !== legajoOriginal) {
        agregarError($("#legajo"), msjLegajo, "El legajo no coincide con el original");
        verificacion = false;
    } else {
        limpiarValidacion($("#legajo"), msjLegajo);
    }

    return verificacion;
}

function agregarError(campo, campoMsj, msj) {
    campoMsj.text(msj);
    campo.addClass("is-invalid");
}

function limpiarValidacion(campo, campoMsj) {
    campoMsj.text('');
    campo.removeClass("is-invalid");
    campo.addClass("is-valid");
}
</script>
<?php
include_once '../../Vista/Estructura/footer.php';
?>