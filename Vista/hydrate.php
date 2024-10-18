<?php
include_once '../configLib.php';
include_once './Estructura/header.php';
?>
<div class="main-container w-100 p-4 d-flex justify-content-center" style="background: linear-gradient(#699676, white)">
    <div class="container border rounded shadow-lg p-4 bg-white" style="max-width: 1100px;">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-uppercase" style="font-size: 28px">Laminas/Hydrator</h2>
            <p class="text-muted" style="font-size: 20px">Una breve introducción a Laminas/Hydrator y su uso.</p>
            <hr class="border-secondary w-50 mx-auto">
        </div>
        <div class="mb-4 d-flex flex-column align-items-center">
            <h4 class="fw-bold text-uppercase">Conceptos importantes</h4>
            <div class="w-75">
                <p class="text-muted text-center" style="font-size: 16px">
                    Antes de saber lo que hace Laminas/Hydrator, hay conceptos y términos que se deben conocer para entender de dónde viene su nombre <strong>"Hydrator"</strong>, en español "Hidratador".
                </p>
            </div>
            <div class="card border border-2 w-50 p-2">
                <p class="text-muted" style="font-size: 16px">
                    La <strong>hidratación</strong> es el proceso de transferir datos de un array a un objeto. Esto es útil cuando los datos provienen de una fuente externa (como una base de datos o una API) y se necesita rellenar los atributos de un objeto con esos datos.
                </p>
                <p class="text-muted" style="font-size: 16px">
                    La <strong>deshidratación</strong> (o extracción) es el proceso inverso, donde los datos del objeto se convierten en un array. Esto es útil para serializar objetos o prepararlos para su almacenamiento o transmisión.
                </p>
            </div>
            <div class="w-75">
                <p class="text-muted mt-3 text-center" style="font-size: 16px">
                    Laminas/Hydrator simplifica este proceso mediante métodos predefinidos para hidratar (poblar) y extraer datos de los objetos. Se pueden personalizar estos procesos mediante estrategias y filtros.
                </p>
            </div>
        </div>
        <div class="mb-4 d-flex flex-column align-items-center">
            <h4 class="fw-bold text-uppercase">Instalación</h4>
            <div class="w-75">
                <p class="text-muted text-center" style="font-size: 16px">
                    Para instalar Laminas/Hydrator, simplemente hay que ejecutar el siguiente comando usando Composer:
                </p>
                <pre class="bg-light border p-3"><code>composer require laminas/laminas-hydrator</code></pre>
                <p class="text-muted ">¿No tenes composer?
                    <a href="https://getcomposer.org/download/" class="text-success">Descargar</a>
                </p>
            </div>
        </div>
        <div class="mb-4 d-flex flex-column align-items-center">
            <h4 class="fw-bold text-uppercase">Ejemplo básico de uso</h4>
            <div class="w-75">
                <p class="text-muted text-center" style="font-size: 16px">
                    A continuación, se muestra un ejemplo de cómo hidratar y extraer datos de un objeto utilizando Laminas/Hydrator:
                </p>
                <pre class="bg-light border p-3 w-auto">
<code>
use Laminas\Hydrator\ClassMethodsHydrator;

class Usuario {
    private $nombre;
    private $email;

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}

$hydrator = new ClassMethodsHydrator();
$usuario = new Usuario();

// Acá se llama a los setters
$usuario = $hydrator->hydrate(['nombre' => 'Juan', 'email' => 'juan@example.com'], $usuario);

// Extrae los datos usando los getters
$data = $hydrator->extract($usuario);

echo $usuario->getNombre();  
// Salida: Juan
echo $data['nombre']; 
// Salida: Juan

</code>
                </pre>
            </div>
        </div>
        <div class="mb-4 d-flex flex-column align-items-center">
            <h4 class="fw-bold text-uppercase">Casos de uso</h4>
            <div class="w-75">
                <p class="text-muted text-center" style="font-size: 16px">
                    Laminas/Hydrator es útil en diversos escenarios, como en la transferencia de datos entre capas de una aplicación, integración con APIs, o la conversión de datos para ser almacenados en una <strong>base de datos</strong> . Por esto se recomienda que sea usado en el Modelo, al igual que en el Control si así lo requiere la aplicación.
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center border-1 shadow-sm h-100">
                    <img src="assets/img/hidratacion.png" class="card-img-top prueba" alt="Hydrator Ejemplo 1" style="object-fit: cover; height: 200px; width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Transformación de Datos</h5>
                        <p class="card-text text-muted" style="font-size: 16px">
                            Laminas/Hydrator permite transformar datos entre objetos y arrays de manera eficiente. Podes convertir un objeto en un array de datos con una simple función.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center border-1 shadow-sm h-100">
                    <img src="assets/img/extract.png" class="card-img-top prueba" alt="Hydrator Ejemplo 1" style="object-fit: contain; height: 200px; width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Extracción de Datos</h5>
                        <p class="card-text text-muted" style="font-size: 16px">
                            Además de hidratar objetos, el Hydrator también puede extraer datos de un objeto y convertirlo en un array. Esto es útil cuando necesitas preparar datos para almacenarlos en una base de datos o enviarlos a través de una API.
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