<?php

namespace model;

use model\connector\BaseDatos;
use Laminas\Hydrator\ClassMethodsHydrator;

class Rol
{
    private $id;
    private $nombre;
    private $hydrator;

    public function __construct($id = null, $nombre = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->hydrator = new ClassMethodsHydrator();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function buscar($dato)
    {
        $rolDatos = [];
        $rta = null;

        $rolDatos = BaseDatos::getInstance()->get('rol', '*', ['id' => $dato]);


        if ($rolDatos) {
            $this->hydrator->hydrate($rolDatos, $this);
            $rta =  $this->hydrator->extract($this);
        }
        return $rta;
    }


    public function listar($condicion = "")
    {
        $where = [];
        $arrObjs = [];
        if ($condicion !== "") {
            $where = ["AND" => $condicion];
        }
        $resultados = BaseDatos::getInstance()->select('rol', '*', $where);

        if ($resultados) {
            foreach ($resultados as $fila) {
                $objRol = new Rol();
                $this->hydrator->hydrate($fila, $objRol);
                $arrObjs[] = $objRol;
            }
        }
        return $arrObjs;
    }

    public function insertar($param)
    {
        $resp = false;
        $database = BaseDatos::getInstance();
        $insertResultado = $database->insert('rol', $param);

        if ($insertResultado) {
            $resp = true;
        }
        return $resp;
    }

    public function eliminar($id)
    {
        $resp = false;
        $idEncontrado = BaseDatos::getInstance()->delete('rol', ['id' => $id]);
        $filaAfec = $idEncontrado->rowCount() > 0;
        if ($filaAfec) {
            $resp = true;
        }
        return $resp;
    }
}
