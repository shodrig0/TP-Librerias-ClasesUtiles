<?php
include_once 'configLib.php';
include_once './Vista/Estructura/header.php';
?>
<div class="main-container w-100 p-4 d-flex justify-content-center" style="background: linear-gradient(#699676, white)">
    <div class="container border rounded shadow-lg p-4 bg-white" style="max-width: 1200px;">
        
        <div class="text-center mb-4">
            <h5 class="fw-bold text-uppercase" style="font-size: 23px">Investigación de Librerías</h5>
            <h6 class="text-muted" style="font-size: 20px">Medoo - Laminas/Hydrator</h6>
            <hr class="border-secondary w-25 mx-auto">
        </div>

        <!-- Sección de Tarjetas de Librerías -->
        <div class="row justify-content-center">
            <!-- Tarjeta Medoo -->
            <div class="col-lg-5 col-md-6 mb-4">
                <div class="card text-center border-0 shadow-sm h-100">
                    <div class="card-body">
                        <img src="Vista/assets/img/medoo-logo.png" class="mb-3" alt="Medoo Logo" style="width: 150px; height: 150px;">
                        <h5 class="card-title fw-bold">Medoo/Medoo</h5>
                        <p class="card-text text-muted" style="font-size: 17px">
                            Medoo es una micro-ORM para PHP que simplifica las interacciones con bases de datos, 
                            permitiendo consultas más eficientes y reduciendo la complejidad de trabajar con SQL.
                        </p>
                        <ul class="text-start list-unstyled">
                            <li>✔ Manejo fácil de SQL</li>
                            <li>✔ Soporte para varias bases de datos</li>
                            <li>✔ Perfecto para proyectos pequeños</li>
                        </ul>
                    </div>
                    <a href="https://medoo.in/doc" class="btn btn-outline-success w-100">Ver Documentación</a>
                </div>
            </div>

            <!-- Tarjeta Hydrator -->
            <div class="col-lg-5 col-md-6 mb-4">
                <div class="card text-center border-0 shadow-sm h-100">
                    <div class="card-body">
                        <img src="Vista/assets/img/hydrator-logo.png" class="mb-3" alt="Hydrator Logo" style="width: 130px; height: 150px;">
                        <h5 class="card-title fw-bold">Laminas/Hydrator</h5>
                        <p class="card-text text-muted" style="font-size: 17px">
                            Laminas/Hydrator es parte del ecosistema Laminas, enfocado en transformar datos entre 
                            estructuras de objetos y arrays o bases de datos.
                        </p>
                        <ul class="text-start list-unstyled">
                            <li>✔ Intercambio de datos sencillo</li>
                            <li>✔ Modular y extensible</li>
                            <li>✔ Ideal para aplicaciones grandes</li>
                        </ul>
                    </div>
                    <a href="https://docs.laminas.dev/laminas-hydrator/" class="btn btn-outline-success w-100">Ver Documentación</a>
                </div>
            </div>
        </div>

        <!-- Sección Extensiva de Detalles -->
        <div id="seccionMedoo" class="mt-5 p-4 bg-light rounded shadow-sm">
            <h5 class="text-center fw-bold">Detalles de Medoo</h5>
            <p class="text-muted">
                Medoo ofrece una capa de abstracción que simplifica la escritura de SQL, proporcionando métodos fáciles para interactuar con diferentes bases de datos.
            </p>
            <h6 class="fw-bold">Características principales:</h6>
            <ul>
                <li>Soporte para múltiples bases de datos: MySQL, MariaDB, PostgreSQL, SQLite, y más</li>
                <li>Consultas SQL simplificadas con arrays asociativos</li>
                <li>Transacciones automáticas y control de errores</li>
                <li>Compatibilidad con JSON y otros formatos de datos</li>
            </ul>
        </div>

        <div id="seccionHydrator" class="mt-5 p-4 bg-light rounded shadow-sm">
            <h5 class="text-center fw-bold">Detalles de Laminas/Hydrator</h5>
            <p class="text-muted">
                Laminas/Hydrator permite transformar datos entre diferentes estructuras, facilitando el desarrollo de aplicaciones complejas.
            </p>
            <h6 class="fw-bold">Características principales:</h6>
            <ul>
                <li>Transformación automática de datos entre estructuras heterogéneas</li>
                <li>Totalmente extensible mediante estrategias personalizadas</li>
                <li>Permite deshidratar (convertir objetos en arrays) y viceversa</li>
            </ul>
        </div>
    </div>
</div>

<?php
include_once './Vista/Estructura/footer.php';
?>
