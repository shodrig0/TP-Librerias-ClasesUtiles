function validar(){

    let banderita = true
    let resultado = confirm("¿Estás seguro que lo desea eliminar?");
    if (!resultado) {
        banderita = false
        alert("Operación cancelada.");
    }   
    return banderita
}