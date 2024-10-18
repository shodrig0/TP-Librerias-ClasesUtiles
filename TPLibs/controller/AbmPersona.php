<?php

namespace controller;

use PDOException;
use model\Persona;
use model\Rol;
use Laminas\Hydrator\ClassMethodsHydrator;

class AbmPersona
{
    private $hydrator;

    public function __construct()
    {
        $this->hydrator = new ClassMethodsHydrator();
    }

    public function buscarPersona($legajo)
    {
        $rta = null;
        $personaModelo = new Persona();
        $resultado = $personaModelo->buscar($legajo);

        if ($resultado) {
            $rolObj = $personaModelo->getObjRol();
            if (!$rolObj) {
                $rolObj = new Rol();
                $personaModelo->setObjRol($rolObj);
            }

            // --- Manejo de Rol ---
            $idRol = $rolObj->getId();
            if ($idRol) {
                $rol = new Rol();
                $datosRol = $rol->buscar($idRol);
                if ($datosRol) {
                    $this->hydrator->hydrate($datosRol, $rolObj);
                }
            }

            $rta = $personaModelo;
        }
        return $rta;
    }

    public function agregarPersona()
    {
        $mensaje = '';
        $personaModelo = $this->datosObjPersona();
        $datos = $this->hydrator->extract($personaModelo);

        if (isset($datos['legajo'])) {
            unset($datos['legajo']);
        }

        if (isset($datos['obj_rol'])) {
            $rol = $datos['obj_rol'];
            if ($rol instanceof Rol && $rol->getId()) {
                $datos['rol'] = $rol->getId();
            }
            unset($datos['obj_rol']);
        }

        $resultado = $personaModelo->insertar($datos);

        if ($resultado) {
            $mensaje = 'Éxito';
        } else {
            $mensaje = 'Error al insertar la persona.';
        }

        return $mensaje;
    }

    public function modificarPersona()
    {
        $msj = '';
        $personaModelo = $this->datosObjPersona();
        $datos = $this->hydrator->extract($personaModelo);

        if (isset($datos['legajo']) && is_numeric($datos['legajo'])) {
            if (isset($datos['obj_rol'])) {
                $rol = $datos['obj_rol'];
                if ($rol instanceof Rol && $rol->getId()) {
                    $datos['rol'] = $rol->getId();
                }
                unset($datos['obj_rol']);
            }
            if ($personaModelo->actualizar($datos)) {
                $msj = 'Éxito';
            } else {
                $msj = 'Error';
            }
        } else {
            $msj = 'Error';
        }

        return $msj;
    }

    public function listarPersonas($condicion = null)
    {
        $personaModelo = new Persona();
        $resultado = [];
        if ($condicion !== null) {
            $resultado = $personaModelo->listar($condicion);
        } else {
            $resultado = $personaModelo->listar();
        }
        return $resultado;
    }

    public function eliminarPersona()
    {
        try {
            $personaModelo = $this->datosObjPersona();
            $datos = $this->hydrator->extract($personaModelo);
            $legajo = $datos['legajo'];

            if ($legajo !== null) {
                $resultado = $personaModelo->eliminar($legajo);
                if ($resultado) {
                    return 'Éxito';
                } else {
                    return 'Error';
                }
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }

        return 'Error';
    }

    private function datosObjPersona()
    {
        $datos = darDatosSubmitted();

        // Manejo de Rol
        if (isset($datos['rol'])) {
            $rol = new Rol($datos['rol']);
            $datos['obj_rol'] = $rol;
        }

        $objPersona = new Persona();
        $this->hydrator->hydrate($datos, $objPersona);
        return $objPersona;
    }
}
