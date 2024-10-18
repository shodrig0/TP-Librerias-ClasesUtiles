function validar() {
    
    let verificacion = true

    let nombre = $("#rol")
    // spans
    let msjNombre = $("#rolNombre")

    if (nombre.val().trim() === "") {
        agregarError(nombre, msjNombre, "Relleno este campo")
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
