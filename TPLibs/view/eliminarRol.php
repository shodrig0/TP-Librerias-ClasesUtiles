<?php 
include_once '../../Vista/Estructura/header.php';
require_once '../../configLib.php';

use controller\AbmRol;
$objAbmRol = new AbmRol();

$arrayRoles = $objAbmRol->listarRoles();
?>

<div class="container w-100 d-flex justify-content-center my-5">
    <div class="card shadow-lg h-auto w-50 rounded-4">
        <div class="bg-success text-white rounded-top">
            <h5 class="pt-3 pb-3 text-center">Roles para Eliminar</h5>
        </div>
        <div class="p-4 bg-light rounded-bottom">
            <table class="table table-bordered rounded-3">
                <tbody>
                    <?php foreach ($arrayRoles as $rol) : ?>
                        <tr>
                            <td class="ps-3 py-3 d-flex justify-content-between align-items-center">
                                <?php echo $rol->getNombre(); ?>
                                <form action="./action/actionEliminarRol.php" method="post">
                                    <button type="submit" class="btn btn-danger me-2" name="id" id="id" value="<?php echo $rol->getId()?>">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">
                <a href="../index.php" class="btn btn-secondary fs-6">Volver al Inicio</a>
            </div>
        </div>
    </div>
</div>

<?php 
include_once '../../Vista/Estructura/footer.php';
?>
