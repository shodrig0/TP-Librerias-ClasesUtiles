<?php
$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$host = $_SERVER['HTTP_HOST'];
$rutaProyecto = "/TP-Librerias-ClasesUtiles";
$baseURL = $protocolo . $host . $rutaProyecto;

// Obtener la ruta actual
$rutaActual = $_SERVER['REQUEST_URI'];

// Función para agregar clase activa
function paginaActual($pagina) {
    global $rutaActual, $rutaProyecto;
    return strpos($rutaActual, $rutaProyecto . $pagina) !== false ? 'current-nav-link' : '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo $baseURL . '/Vista/assets/img/navegador.png' ?>">
    <title>Trabajos Prácticos - Grupo 17</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="<?php echo $baseURL . "/TP3/EJ3/Vista/js/validacion.js"; ?>"></script>
    <link rel="stylesheet" href="<?php echo $baseURL . "/Vista/css/style.css"; ?>">
    <link rel="stylesheet" href="<?php echo $baseURL . "/node_modules/bootstrap/dist/css/bootstrap.css"; ?>">
    <link rel="stylesheet" href="<?php echo $baseURL . "/node_modules/bootstrap/dist/css/init.css"; ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Roboto';" class="bg-white">
<header class="bg-white text-center shadow p-3">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-around">
            <div class="col-10">
                <nav>
                    <ul class="nav justify-content-around list-unstyled">
                        <li class="nav-item">
                            <a href="<?php echo $baseURL . "/index.php"; ?>" class="nav-link fw-bold <?php echo paginaActual("/index.php"); ?>">
                                Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $baseURL . "/Vista/medoo.php"; ?>" class="nav-link fw-bold <?php echo paginaActual("/Vista/medoo.php"); ?>">
                                MeDoo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $baseURL . "/Vista/hydrate.php"; ?>" class="nav-link fw-bold <?php echo paginaActual("/Vista/hydrate.php"); ?>">
                                Hydrator
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $baseURL . "/TPLibs/index.php"; ?>" class="nav-link fw-bold <?php echo paginaActual("/TPLibs/index.php"); ?>">
                                Implementación
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
