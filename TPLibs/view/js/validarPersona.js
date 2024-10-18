const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/
}

function validar() {
    let verificacion = true

    let nombre = $("#nombre")
    let rol = $("#rol")
    // spans
    let msjNombre = $("#personaNombre")
    let msjRol = $("#personaRol")

    if (nombre.val().trim() === "") {
        agregarError(nombre, msjNombre, "Rellena este campo")
        verificacion = false
    } else if (!expresiones.nombre.test(nombre.val())) {
        agregarError(nombre, msjNombre, "Nombre inválido")
        verificacion = false
    } else {
        limpiarValidacion(nombre, msjNombre)
    }

    if (rol.val().trim() === "") {
        agregarError(rol, msjRol, "Seleccione una opcion")
        verificacion = false
    } else {
        limpiarValidacion(rol, msjRol)
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
