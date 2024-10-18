<?php

namespace model;

require_once 'Rol.php';
require_once 'connector/BaseDatos.php';

use model\Connector\BaseDatos;
use Laminas\Hydrator\ClassMethodsHydrator;

class Persona
{
    private $legajo;
    private $nombre;
    private $objRol;
    private $hydrator;

    public function __construct()
    {
        $this->legajo = null;
        $this->nombre = null;
        $this->objRol = new Rol();
        $this->hydrator = new ClassMethodsHydrator();
    }

    // Métodos setters
    public function setLegajo($legajo)
    {
        $this->legajo = $legajo;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setObjRol($rol)
    {
        $this->objRol = $rol;
    }

    // Métodos getters
    public function getLegajo()
    {
        return $this->legajo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getObjRol()
    {
        return $this->objRol;
    }

    public function buscar($legajo)
    {
        $rta = false;
        $personaDatos = BaseDatos::getInstance()->get('usuario', '*', ['legajo' => $legajo]);
        if ($personaDatos) {
            $rta = $this->hydrator->hydrate($personaDatos, $this);
        }
        return $rta;
    }

    public function listar($condicion = "")
    {
        $where = [];
        if ($condicion !== "") {
            $where = ['AND' => $condicion];
        }

        $database = BaseDatos::getInstance();
        $resultados = $database->select('usuario', '*', $where);
        $personas = [];

        foreach ($resultados as $fila) {
            $persona = new Persona();
            $this->hydrator->hydrate($fila, $persona);

            // Crear y configurar el objeto Rol
            if (isset($fila['rol'])) {
                $rol = new Rol();
                $rol->setId($fila['rol']);
                // Buscar el nombre del rol a partir de su id y setearlo
                $rolDatos = $rol->buscar($fila['rol']);
                if ($rolDatos) {
                    $this->hydrator->hydrate($rolDatos, $rol);
                }
                $persona->setObjRol($rol);
            }

            $personas[] = $persona;
        }
        return $personas;
    }

    public function insertar($param)
    {
        $database = BaseDatos::getInstance();
        $insertResultado = $database->insert('usuario', $param);
        if (!$insertResultado) {
            throw new \Exception("No se pudo insertar el registro");
        }

        return $insertResultado;
    }

    public function actualizar($param)
    {
        $database = BaseDatos::getInstance();
        $resultado = false;
        if ($database->has('usuario', ['legajo' => $param['legajo']])) {
            $resultado = $database->update('usuario', $param, ['legajo' => $param['legajo']])->rowCount() > 0;
        } else {
            throw new \Exception("No se encontró el registro a actualizar");
        }

        return $resultado;
    }

    public function eliminar($legajo)
    {
        $legajoEncontrado = BaseDatos::getInstance()->delete('usuario', ['legajo' => $legajo]);
        $obj = $legajoEncontrado->rowCount() > 0;
        if (!$obj) {
            throw new \Exception("No se pudo eliminar el registro");
        }
        return $obj;
    }
}
