<?php
require_once '../../../configLib.php';

use controller\AbmPersona;
use controller\AbmRol;

$objAbmPersona = new AbmPersona();
$objAbmRol = new AbmRol();
$msj = '';
$msjTipo = ''; // Variable para definir el tipo de mensaje (éxito o error)
$i = 0;

include_once '../Estructura/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = darDatosSubmitted();
    $legajo = $datos['legajo'];
    $resp = $objAbmPersona->buscarPersona($legajo); // retorna un objeto o nulo

    if ($resp) {
        // Datos de la persona
        $nombre = $resp->getNombre();

        // Rol actual
        $rolActual = $resp->getObjRol();
        // var_dump($rolActual);
        $idRolActual = $rolActual ? $rolActual->getId() : null;
        $roles = $objAbmRol->listarRoles(); //  roles dinámicos

        $msj = '
        <form onsubmit="return validar()" action="actionActualizarPersona.php" method="POST" class="bg-light p-4 rounded shadow-sm">
            <div class="mb-4">
                <label for="legajo" class="form-label fw-bold">Legajo:</label>
                <input type="text" class="form-control" name="legajo" id="legajo" value="' . htmlspecialchars($legajo) . '" readonly />
            </div>

            <div class="mb-4">
                <label for="nombre" class="form-label fw-bold">Nombre y Apellido:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="' . htmlspecialchars($nombre) . '" />
            </div>

            <div class="mb-4">
                <label for="rol" class="form-label fw-bold">Rol:</label>
                <select class="form-select" name="rol" id="rol">';



        foreach ($roles as $rol) {
            $selected = ($rol->getId() == $idRolActual) ? 'selected' : '';

            $msj .= '<option value="' . $rol->getId() . '" ' . $selected . '>'
                . htmlspecialchars($rol->getNombre())
                . '</option>';
        }

        $msj .= '</select>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary px-4">Actualizar</button>
                <button type="button" class="btn btn-danger px-4" onclick="window.location=\'../eliminarPersona.php\';">Eliminar</button>
            </div>
        </form>';

        $msjTipo = 'success';
    } else {
        $msj = 'No se encontró a la persona con el legajo ingresado.';
        $msjTipo = 'danger';
    }
}
?>

<div class="container mt-4">
    <h1 class="mb-4">Buscar Persona</h1>
    <?php if (isset($msj)): ?>
        <div class="alert alert-<?php echo htmlspecialchars($msjTipo); ?> mt-3" role="alert">
            <?php echo $msj; ?>
        </div>
    <?php endif; ?>
    <a href="../buscarPersona.php" class="btn btn-secondary mt-3 fs-5">Volver</a>
</div>
<script src="../js/validarActualizarPersona.js"></script>
<?php
include_once '../../../Vista/Estructura/footer.php';
?>