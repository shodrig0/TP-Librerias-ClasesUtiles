// function validar() {
//     let verificacion = true;
//     let legajoOriginal = sessionStorage.getItem("legajoOriginal");
//     let legajo = $("#legajo").val();
//     let msjLegajo = $("#msjErrorLegajo");

//     if (legajo.trim() === "") {
//         agregarError($("#legajo"), msjLegajo, "Ingrese el número de legajo");
//         verificacion = false;
//     } else if (legajo !== legajoOriginal) {
//         agregarError($("#legajo"), msjLegajo, "El legajo no coincide con el original");
//         verificacion = false;
//     } else {
//         limpiarValidacion($("#legajo"), msjLegajo);
//     }

//     return verificacion;
// }

// function agregarError(campo, campoMsj, msj) {
//     campoMsj.text(msj);
//     campo.addClass("is-invalid");
// }

// function limpiarValidacion(campo, campoMsj) {
//     campoMsj.text('');
//     campo.removeClass("is-invalid");
//     campo.addClass("is-valid");
// }