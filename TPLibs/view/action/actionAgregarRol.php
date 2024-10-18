<?php

require_once '../../../configLib.php';

use controller\AbmRol;

$objAbmRol = new AbmRol();
$msj = '';
$msjTipo = '';
$rolAgregado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resp = $objAbmRol->agregarRol();
    print_r($resp);
    if ($resp === 'Éxito') {
        $msj = 'Rol agregado con éxito.';
        $msjTipo = 'success';
    } else {
        $msj = 'Error al agregar el rol';
        $msjTipo = 'danger';
    }
}

include_once '../Estructura/header.php';
?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Agregar Rol</h1>

    <?php if (!empty($msj)): ?>
        <div class="alert alert-<?php echo $msjTipo; ?> text-center" role="alert">
            <?php echo htmlspecialchars($msj); ?>
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-center">
        <a href="../agregarRol.php" class="btn btn-secondary btn-lg mt-3">Volver</a>
    </div>
</div>

<?php
include_once '../../../Vista/Estructura/footer.php';
?>