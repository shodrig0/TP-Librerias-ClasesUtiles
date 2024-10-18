<?php
require_once '../../configLib.php';
include_once 'Estructura/header.php';

// use controller\AbmPersona;
use controller\AbmRol;

// $objAbmPersona = new AbmPersona();
$objAbmRol = new AbmRol();
$msj = '';
$msjTipo = ''; // Variable para definir el tipo de mensaje (éxito o error)


$arrayRoles = $objAbmRol->listarRoles();


?>
<div class="container d-flex justify-content-center mt-5 mb-10">
    <div class="card shadow-lg p-5" style="width: 40rem;">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Agregar Persona</h3>
            <form onsubmit="return validar()" action="./action/actionAgregarPersona.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre y Apellido:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Rodrigo Villablanca">
                </div>
                <div class="mb-4">
                    <label for="rol" class="form-label">Rol:</label>
                    <select class="form-control" name="rol" id="rol">
                        <option value="">Selecciona un rol</option>
                        <?php foreach ($arrayRoles as $rol): ?>
                            <option value="<?php echo htmlspecialchars($rol->getId()); ?>">
                                <?php echo htmlspecialchars($rol->getNombre()); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Agregar</button>
                    <a href="../" class="btn btn-secondary">
                        << Volver>>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include_once '../../Vista/Estructura/footer.php';
?>