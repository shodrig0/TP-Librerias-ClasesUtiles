<?php
include_once '../configLib.php';
include_once './Estructura/header.php';
?>
<div class="main-container w-100 p-4 d-flex justify-content-center" style="background: linear-gradient(#699676, white)">
    <div class="container border rounded shadow-lg p-4 bg-white" style="max-width: 1200px;">
        
        <div class="text-center mb-4">
            <h2 class="fw-bold text-uppercase" style="font-size: 28px">Medoo</h2>
            <p class="text-muted" style="font-size: 20px">Una breve introducción a Medoo y su uso.</p>
            <hr class="border-secondary w-50 mx-auto">
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center border-0 shadow-sm h-100">
                    <img src="assets/img/bd-medoo.png" class="card-img-top" alt="Medoo Ejemplo 1" style="height: 400px width: 400px ;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Conexión Simple</h5>
                        <p class="card-text text-muted" style="font-size: 16px">
                            Realizar una conexión a la base de datos en Medoo es extremadamente simple. Solo necesitás instanciar la clase Medoo y pasar los parámetros de configuración.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center border-0 shadow-sm h-100">
                    <img src="assets/img/buscar.png" class="card-img-top" alt="Medoo Ejemplo 2" style="height: 400px width:400px ;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Consulta SQL Simplificada</h5>
                        <p class="card-text text-muted" style="font-size: 16px">
                            Con Medoo, puedes realizar consultas SQL de manera simplificada usando arrays asociativos. Este es un ejemplo básico de cómo seleccionar datos.
                        </p>
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center border-0 shadow-sm h-100">
                    <img src="assets/img/Insert.png" class="card-img-top" alt="Medoo Ejemplo 3" style="height: 400px width:400px">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Inserción de Datos</h5>
                        <p class="card-text text-muted" style="font-size: 16px">
                        Medoo permite insertar datos en la base de datos de manera sencilla. La función insertar recibe un array con los datos del usuario y los inserta en la tabla 'usuario'. Retorna el resultado de la operación, indicando si la inserción fue exitosa.
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
