<?php

namespace controller;

use model\Rol;
use Laminas\Hydrator\ClassMethodsHydrator;
use Exception;

class AbmRol
{
    private $hydrator;

    public function __construct()
    {
        $this->hydrator = new ClassMethodsHydrator();
    }

    public function buscarRol($dato)
    {
        $rolModelo = new Rol();
        $rolExistente = null;
        $resultado = $rolModelo->buscar($dato);

        if ($resultado) {
            // Hidratamos el modelo con los datos obtenidos
            $this->hydrator->hydrate($resultado, $rolModelo);
            $rolExistente = $rolModelo;
        }
        return $rolExistente;
    }

    public function agregarRol()
    {
        $mensaje = '';
        $rolModelo = $this->datosObjRol();
        $datos = $this->hydrator->extract($rolModelo);
        // Verificamos si ya existe un rol con ese nombre antes de insertarlo
        if (isset($datos['nombre'])) {
            $rolExistente = $this->buscarRol($datos['nombre']);
            if ($rolExistente) {
                $mensaje = 'Error: El rol ya existe en la base de datos.';
            } else {
                $resultado = $rolModelo->insertar($datos);
                if ($resultado) {
                    $mensaje = 'Éxito';
                } else {
                    $mensaje = 'Error: No se pudo agregar el rol.';
                }
            }
        }

        return $mensaje;
    }



    public function eliminarRol()
    {
        $msj = "";
        try {
            $rolModelo = $this->datosObjRol();
            $datos = $this->hydrator->extract($rolModelo);
            $id = $datos['id'] ?? null;

            if ($id !== null) {
                $resultado = $rolModelo->eliminar($id);
                $msj = $resultado ? 'Éxito: Rol eliminado correctamente.' : 'Error al eliminar el rol.';
            } else {
                $msj = 'Error: ID no válido.';
            }
        } catch (\PDOException $e) {
            if ($e->getCode() == '23000') {
                $msj = 'No se puede eliminar el rol porque está asignado a uno o más usuarios.';
            } else {
                $msj = 'Error: ' . $e->getMessage();
            }
        } catch (Exception $e) {
            $msj = 'Error: ' . $e->getMessage();
        }
        return $msj;
    }

    public function listarRoles($condicion = null)
    {
        $rolModelo = $this->datosObjRol();
        $resultado = $condicion ? $rolModelo->listar($condicion) : $rolModelo->listar();
        return $resultado;
    }

    private function datosObjRol()
    {
        $datos = darDatosSubmitted();
        $objRol = new Rol();
        $this->hydrator->hydrate($datos, $objRol);
        return $objRol;
    }
}
