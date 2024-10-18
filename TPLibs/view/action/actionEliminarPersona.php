<?php

require_once '../../../configLib.php';


use controller\AbmPersona;

$msj = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['legajo'])) {
    $objAbmPersona = new AbmPersona();
    $resultado = $objAbmPersona->eliminarPersona();

    if ($resultado === 'Éxito') {
        $msj = 'Se borró la persona con éxito.';
        $msjTipo = 'success';
    } else {
        $msj = 'Ocurrió un error al intentar borrar la persona.';
        $msjTipo = 'danger';
    }
}

include_once '../Estructura/header.php';
?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Eliminar Persona</h1>

    <!-- Mostrar mensaje de éxito o error -->
    <?php if ($msj): ?>
        <div class="alert alert-<?php echo htmlspecialchars($msjTipo); ?> text-center" role="alert">
            <?php echo htmlspecialchars($msj); ?>
        </div>
    <?php endif; ?>

    <!-- Botón de volver -->
    <div class="d-flex justify-content-center mt-4">
        <a href="../../" class="btn btn-secondary btn-lg">Volver al Inicio</a>
    </div>
</div>
<?php
include_once '../../../Vista/Estructura/footer.php';
?>