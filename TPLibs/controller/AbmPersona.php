<?php

namespace controller;

use PDOException;
use model\Persona;
use model\Rol;
use Laminas\Hydrator\ClassMethodsHydrator;
use PDO;

class AbmPersona
{
    private $hydrator;

    public function __construct()
    {
        $this->hydrator = new ClassMethodsHydrator();
    }

    public function buscarPersona($legajo)
    {
        $msj = null;
        $personaModelo = new Persona();

        try {
            $resultado = $personaModelo->buscar($legajo);
            if ($resultado) {
                $rolObj = $personaModelo->getObjRol();

                // Si no hay rol asignado, creamos uno vacío
                if (!$rolObj) {
                    $rolObj = new Rol();
                    $personaModelo->setObjRol($rolObj);
                }

                $idRol = $rolObj->getId();


                if ($idRol) {
                    $rol = new Rol();
                    $datosRol = $rol->buscar($idRol);

                    if ($datosRol) {
                        $this->hydrator->hydrate($datosRol, $rolObj);
                    } else {
                        $rolObj = null;
                    }
                }

                $msj = $personaModelo;
            }
        } catch (PDOException $e) {
            throw new PDOException('Error al buscar la persona: ' . $e->getMessage());
        }

        return $msj;
    }

    public function agregarPersona()
    {
        $mensaje = '';
        try {
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
                $mensaje = 'Error';
            }
        } catch (PDOException $e) {
            $mensaje = 'Error: ' . $e->getMessage();
        }

        return $mensaje;
    }


    public function modificarPersona()
    {
        $msj = '';
        try {
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
        } catch (PDOException $e) {
            $msj = 'Error grave: ' . $e->getMessage();
        }
        return $msj;
    }


    public function listarPersonas($condicion = null)
    {
        $personaModelo = new Persona();
        $resultado = [];

        try {
            $resultado = $condicion ? $personaModelo->listar($condicion) : $personaModelo->listar();
        } catch (PDOException $e) {
            throw new PDOException('Error al listar personas: ' . $e->getMessage());
        }
        return $resultado;
    }

    public function eliminarPersona()
    {
        $msj = '';

        try {
            $personaModelo = $this->datosObjPersona();
            $datos = $this->hydrator->extract($personaModelo);
            $legajo = $datos['legajo'] ?? null;

            if ($legajo !== null) {
                $resultado = $personaModelo->eliminar($legajo);
                if ($resultado) {
                    $msj = 'Éxito';
                } else {
                    $msj = 'Error';
                }
            } else {
                $msj = 'Error';
            }
        } catch (PDOException $e) {
            $msj = 'Error de base de datos: ' . $e->getMessage();
        }
        return $msj;
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
