<?php

require_once '../../configLib.php';

use controller\AbmRol;

$objAbmRol = new AbmRol();
$colRoles = $objAbmRol->listarRoles();

include_once 'Estructura/header.php';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center bg-success text-white">
                    <h1 class="h4 mt-2">Seleccionar Rol</h1>
                    <h6>Se mostrarán todos los usuarios con tal rol</h6>
                </div>
                <div class="card-body">
                    <form action="./action/actionListarPorRol.php" method="get">
                        <div class="mb-3">
                            <label for="rol" class="form-label">Selecciona un Rol:</label>
                            <select id="rol" name="rol" class="form-select" required>
                                <option value="">-- Elige un Rol --</option>
                                <?php
                                // Llenar el select con los roles obtenidos
                                foreach ($colRoles as $rol) {
                                    echo "<option value=\"{$rol->getId()}\">{$rol->getNombre()}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="d-flex flex-column w-50 align-items-center">
                                <button type="submit" class="btn btn-success fs-6 w-100">Filtrar</button>
                                <a href="../index.php" class="btn btn-secondary fs-6 w-100 mt-2">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once '../../Vista/Estructura/footer.php';
?>