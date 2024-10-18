const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
}

function validar() {
    
    let verificacion = true

    let nombre = $("#nombre")

    // spans
    let msjNombre = $("#personaNombre")


    if (nombre.val().trim() === "") {
        agregarError(nombre, msjNombre, "Relleno este campo")
        verificacion = false
    } else if (!expresiones.nombre.test(nombre.val())) {
        agregarError(nombre, msjNombre, "Nombre inválido")
        verificacion = false
    } else {
        limpiarValidacion(nombre, msjNombre)
    }

    return verificacion
}

function agregarError(campo, campoMsj, msj) {
    campoMsj.text(msj)
    campo.addClass("is-invalid")
}

function limpiarValidacion(campo, campoMsj) {
    campoMsj.text('')
    campo.removeClass("is-invalid")
    campo.addClass("is-valid")
}