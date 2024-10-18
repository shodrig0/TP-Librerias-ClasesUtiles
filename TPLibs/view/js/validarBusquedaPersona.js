function validar() {
    let verificacion = true
    let nroLegajo = $("#legajo")
    let msjLegajo = $("#msjErrorLegajo")
    const expreReg = /^\d{1,4}$/

    if (nroLegajo.val().trim() === "") {
        agregarError(nroLegajo, msjLegajo, "Ingrese un numero de legajo")
        verificacion = false
    } else if (!expreReg.test(nroLegajo.val().trim())) {
        agregarError(nroLegajo, msjLegajo, "El legajo debe tener de 3 a 4 dígitos")
        verificacion = false
    } else {
        limpiarValidacion(nroLegajo, msjLegajo)
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