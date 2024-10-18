<?php
include_once '../../configLib.php';
include_once 'Estructura/header.php';

use controller\AbmRol;


$objAbmRol = new AbmRol();
$msj = '';
$msjTipo = ''; 

$arrayRoles = $objAbmRol->listarRoles();


?>
<div class="container d-flex justify-content-center mt-5 mb-10">
    <div class="card shadow-lg p-5" style="width: 40rem;">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Agregar Rol</h3>
            <form onsubmit="return validar()" action="./action/actionAgregarRol.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Rol:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Tutor">
                </div>
                <div class="mb-4">
                    <table>
                        <tbody>
                            <tr>
                                <th>Roles existentes:</th>
                            </tr>
                            <?php foreach ($arrayRoles as $rol): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($rol->getNombre()); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Agregar</button>
                    <a href="../" class="btn btn-secondary">
                        <<Volver>>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include_once '../../Vista/Estructura/footer.php';
?>