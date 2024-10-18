<?php

include_once '../../../Vista/Estructura/header.php';
require_once '../../../configLib.php';


use controller\AbmPersona;

// Obtén el rol desde el GET
$rolSeleccionado = darDatosSubmitted();

$objAbmPersona = new AbmPersona();
$colPersonas = $objAbmPersona->listarPersonas($rolSeleccionado);

$msj = '';

if ($rolSeleccionado && count($colPersonas) > 0) {

    $msj = <<<HTML
    <table class="table table-striped table-bordered">
        <thead class="table-success">
            <tr>
                <th>Legajo</th>
                <th>Nombre</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
    HTML;

    foreach ($colPersonas as $persona) {

        $nombreRol = $persona->getObjRol()->getNombre();

        $msj .= <<<FILA
        <tr>
            <td>FAI-{$persona->getLegajo()}</td>
            <td>{$persona->getNombre()}</td>
            <td>{$nombreRol}</td>
        </tr>
        FILA;
    }

    $msj .= <<<HTML
        </tbody>
    </table>
    HTML;

} elseif ($rolSeleccionado) {
    $msj = <<<HTML
    <div class="alert alert-warning" role="alert">
        No hay personas con el rol seleccionado.
    </div>
    HTML;
} else {
    $msj = <<<HTML
    <div class="alert alert-danger" role="alert">
        No se ha seleccionado ningún rol.
    </div>
    HTML;
}

?>

<div class="container mt-5">
    <h1 class="text-center">Personas por Rol</h1>
    <div class="mt-4">
        <?php if ($msj): ?>
            <?php echo $msj; ?>
        <?php endif; ?>
    </div>
    <div class="d-flex justify-content-center mt-4">
        <a href="../listarPersonasRol.php" class="btn btn-secondary fs-6">Volver a Seleccionar Rol</a>
    </div>
</div>

<?php
include_once '../../../Vista/Estructura/footer.php';
?>
