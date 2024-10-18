<?php

namespace model\connector;

use Medoo\Medoo;

class BaseDatos
{
    private static $instance = null;
    private $database;

    private function __construct()
    {
        $this->database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'medoo_db',
            'server' => 'localhost',
            'username' => 'root',
            'password' => ''
        ]);
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new BaseDatos();
        }
        return self::$instance->database;
    }

    public function getConexion()
    {
        return $this->database;
    }
}
