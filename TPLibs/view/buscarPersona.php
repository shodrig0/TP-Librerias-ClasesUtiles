<?php
require_once '../../configLib.php';
include_once 'Estructura/header.php';
?>
<div class="container mt-5 p-4" style="max-width: 600px; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h2 class="text-center text-success mb-4">Buscar Persona</h2>

    <form onsubmit="return guardarLegajo()" action="./action/actionBuscarPersona.php" method="POST" id="form">
        <div class="mb-3">
            <label for="legajo" class="form-label fw-bold">Número de Legajo</label>
            <input type="number" class="form-control form-control-lg rounded" placeholder="Ej. 4525" id="legajo" name="legajo">
        </div>

        <div class="text-danger mb-3" id="msjErrorLegajo"></div>

        <div class="d-flex flex-column align-items-center w-100 gap-3">
            <button class="btn btn-success fs-5 w-50" type="submit">Buscar</button>
            <a href="../index.php" class="btn btn-secondary w-50 fs-5">Volver</a>
        </div>
    </form>
</div>
<!-- <script src="js/validarEliminarPersona.js"></script> -->
<script type="text/javascript">
    function guardarLegajo() {
    let nroLegajo = $("#legajo").val();
    sessionStorage.setItem("legajoOriginal", nroLegajo);
    return validar();
    
}

function validar() {
    let verificacion = true;
    let nroLegajo = $("#legajo");
    let msjLegajo = $("#msjErrorLegajo");
    const expreReg = /^\d{1,4}$/;

    if (nroLegajo.val().trim() === "") {
        agregarError(nroLegajo, msjLegajo, "Ingrese un número de legajo");
        verificacion = false;
    } else if (!expreReg.test(nroLegajo.val().trim())) {
        agregarError(nroLegajo, msjLegajo, "El legajo debe tener de 3 a 4 dígitos");
        verificacion = false;
    } else {
        limpiarValidacion(nroLegajo, msjLegajo);
    }
    return verificacion;
}

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