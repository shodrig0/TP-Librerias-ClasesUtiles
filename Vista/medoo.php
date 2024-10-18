<?php
include_once '../configLib.php';
include_once './Estructura/header.php';
?>
<div class="main-container w-100 p-4 d-flex justify-content-center" style="background: linear-gradient(#699676, white)">
    <div class="container border rounded shadow-lg p-4 bg-white" style="max-width: 1100px;">

        <div class="text-center mb-4">
            <h2 class="fw-bold text-uppercase" style="font-size: 28px">Medoo</h2>
            <p class="text-muted" style="font-size: 20px">Una breve introducción a Medoo y su uso.</p>
            <hr class="border-secondary w-50 mx-auto">
        </div>

        <div class="mb-4 d-flex flex-column align-items-center">
            <h4 class="fw-bold text-uppercase">Conceptos importantes</h4>
            <div class="w-75">
                <p class="text-muted text-center" style="font-size: 16px">
                    Medoo es un framework de acceso a bases de datos que simplifica las consultas SQL en PHP. <br>
                    Es ligero, rápido y permite una integración sencilla con múltiples bases de datos.
                </p>
            </div>
            <div class="card border border-2 w-50 p-2 text-center">
                <p class="text-muted" style="font-size: 16px">
                    A diferencia de otros ORM complejos, Medoo trabaja directamente con arrays asociativos para realizar consultas, lo que te permite mayor control sobre el SQL sin perder la simplicidad de una aplicación amigable.
                </p>
                <p class="text-muted" style="font-size: 16px">
                    Se destaca por su facilidad de uso y por estar diseñado para tareas básicas de CRUD, haciéndolo perfecto para proyectos pequeños o medianos.
                </p>
            </div>
        </div>

        <div class="mb-4 d-flex flex-column align-items-center">
            <h4 class="fw-bold text-uppercase">Instalación</h4>
            <div class="w-75">
                <p class="text-muted text-center" style="font-size: 16px">
                    Para instalar Medoo usando Composer, simplemente se debe ejecutar el siguiente comando:
                </p>
                <pre class="bg-light border p-3"><code>composer require catfan/medoo</code></pre>
                <p class="text-muted ">¿No tenes composer?
                    <a href="https://getcomposer.org/download/" class="text-success">Descargar</a>
                </p>
            </div>
        </div>

        <div class="mb-4 d-flex flex-column align-items-center">
            <h4 class="fw-bold text-uppercase">Ejemplo básico de uso</h4>
            <div class="w-75">
                <p class="text-muted text-center" style="font-size: 16px">
                    Un ejemplo básico de cómo conectar a la base de datos y realizar una consulta utilizando Medoo:
                </p>
                <pre class="bg-light border p-3 w-auto">
<code>
use Medoo\Medoo;

$database = new Medoo([
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'nombre_bd',
    'username' => 'usuario',
    'password' => 'contraseña'
]);

// Inserción de datos
$database->insert('usuarios', [
    'nombre' => 'Juan',
    'email' => 'juan@example.com'
]);

// Selección de datos
$data = $database->select('usuarios', ['nombre', 'email'], [
    'nombre' => 'Juan'
]);

echo $data[0]['email'];
// Salida: juan@example.com
</code>
                </pre>
            </div>
        </div>

        <div class="mb-4 d-flex flex-column align-items-center">
            <h4 class="fw-bold text-uppercase">Casos de uso</h4>
            <div class="w-75">
                <p class="text-muted text-center" style="font-size: 16px">
                    Medoo es ideal para proyectos que requieren un manejo sencillo de base de datos, como aplicaciones CRUD, sistemas pequeños de administración, o aplicaciones que solo necesitan consultas SQL simples sin la sobrecarga de un ORM completo.
                </p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center border-0 shadow-sm h-100">
                    <img src="assets/img/bd-medoo.png" class="card-img-top prueba" alt="Medoo Ejemplo 1" style="height: 250px; width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Conexión Simple</h5>
                        <p class="card-text text-muted" style="font-size: 16px">
                            Con Medoo, realizar una conexión a la base de datos es extremadamente sencillo. Solo necesitas instanciar la clase Medoo y pasar los parámetros de configuración. Podes usarlo con conexión del tipo PDO o MySQLi.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center border-0 shadow-sm h-100">
                    <img src="assets/img/buscar.png" class="card-img-top prueba" alt="Medoo Ejemplo 2" style="height: 250px; width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Consulta SQL Simplificada</h5>
                        <p class="card-text text-muted" style="font-size: 16px">
                            Medoo permite realizar consultas SQL utilizando arrays asociativos. Esto simplifica el proceso y lo hace más intuitivo para desarrolladores que ya están familiarizados con arrays en PHP.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center border-0 shadow-sm h-100">
                    <img src="assets/img/Insert.png" class="card-img-top prueba" alt="Medoo Ejemplo 3" style="height: 250px; width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Inserción de Datos</h5>
                        <p class="card-text text-muted" style="font-size: 16px">
                            Insertar datos en una base de datos con Medoo es tan sencillo como pasar un array de datos a la función insert, lo que te permite concentrarte más en la lógica de tu aplicación que en los detalles técnicos.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include_once './Estructura/footer.php';
        ?>