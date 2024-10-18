// function guardarLegajo() {
//     let nroLegajo = $("#legajo").val();
//     sessionStorage.setItem("legajoOriginal", nroLegajo);
//     return validar();
    
// }

// function validar() {
//     let verificacion = true;
//     let nroLegajo = $("#legajo");
//     let msjLegajo = $("#msjErrorLegajo");
//     const expreReg = /^\d{1,4}$/;

//     if (nroLegajo.val().trim() === "") {
//         agregarError(nroLegajo, msjLegajo, "Ingrese un número de legajo");
//         verificacion = false;
//     } else if (!expreReg.test(nroLegajo.val().trim())) {
//         agregarError(nroLegajo, msjLegajo, "El legajo debe tener de 3 a 4 dígitos");
//         verificacion = false;
//     } else {
//         limpiarValidacion(nroLegajo, msjLegajo);
//     }
//     return verificacion;
// }

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

