<?php
require_once '../configLib.php';
include_once './view/Estructura/header.php';
?>
<div class="container mt-4">
    <h1 class="text-center mt-5">Gestión de Datos</h1>
    <div class="row mt-4">

        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Gestión de Personas</h5>
                    <p class="card-text">Administra las personas registradas en el sistema</p>
                    <a href="./view/agregarPersona.php" class="btn btn-success mb-2 w-100">Agregar Persona</a>
                    <a href="./view/listarPersonas.php" class="btn btn-white mb-2 w-100 border border-2">Listar Personas</a>
                    <a href="./view/buscarPersona.php" class="btn btn-success w-100">Buscar Persona</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Gestión de Roles</h5>
                    <p class="card-text">Administra los roles disponibles en el sistema</p>
                    <a href="./view/agregarRol.php" class="btn btn-success mb-2 w-100">Agregar Rol</a>
                    <a href="./view/listarPersonasRol.php" class="btn btn-white mb-2 w-100 border border-2">Listar Personas por Rol</a>
                    <a href="./view/eliminarRol.php" class="btn btn-success w-100">Eliminar Rol</a>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        <a href="../" class="btn btn-secondary fs-6">Volver al Inicio</a>
    </div>
</div>
<?php
include_once '../Vista/Estructura/footer.php';
?>