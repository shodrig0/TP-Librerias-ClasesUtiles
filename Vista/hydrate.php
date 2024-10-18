<?php
include_once '../configLib.php';
include_once './Estructura/header.php';
?>
<div class="main-container w-100 p-4 d-flex justify-content-center" style="background: linear-gradient(#699676, white)">
    <div class="container border rounded shadow-lg p-4 bg-white" style="max-width: 1200px;">
        
        <div class="text-center mb-4">
            <h2 class="fw-bold text-uppercase" style="font-size: 28px">Laminas/Hydrator</h2>
            <p class="text-muted" style="font-size: 20px">Una breve introducción a Laminas/Hydrator y su uso.</p>
            <hr class="border-secondary w-50 mx-auto">
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center border-0 shadow-sm h-100">
                    <img src="hydrateee.png" class="card-img-top" alt="Hydrator Ejemplo 1" style="height: 200px; width: 368px;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Transformación de Datos</h5>
                        <p class="card-text text-muted" style="font-size: 16px">
                            Laminas/Hydrator permite transformar datos entre objetos y arrays de manera eficiente. Podes convertir un objeto en un array de datos con una simple función.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center border-0 shadow-sm h-100">
                <img src="hydrateee.png" class="card-img-top" alt="Hydrator Ejemplo 1" style="height: 200px; width: 368px;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Hidratación de Objetos</h5>
                        <p class="card-text text-muted" style="font-size: 16px">
                            Con Hydrator, podes llenar objetos a partir de un array de datos, facilitando la manipulación de datos en tu aplicación.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center border-0 shadow-sm h-100">
                <img src="hydrateee.png" class="card-img-top" alt="Hydrator Ejemplo 1" style="height: 200px; width: 368px;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Modularidad Extensible</h5>
                        <p class="card-text text-muted" style="font-size: 16px">
                            Laminas/Hydrator es completamente modular y permite crear estrategias personalizadas para transformar datos complejos en tu aplicación.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once './Estructura/footer.php';
?>
