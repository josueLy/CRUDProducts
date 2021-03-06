<?php

define('__ROOTMODEL__', dirname(dirname(__FILE__)));
require_once(__ROOTMODEL__ . '/Datos/Conexion.php');
require_once(__ROOTMODEL__ . '/Entidades/Usuario.php');

class ModeloUsuario {

    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function login(Usuario $usuario): bool {
        $sql = "SELECT * FROM Usuarios where nombreUsuario= '" . $usuario->getNombreUsuario() . "'"
                . " and contrasena='" . $usuario->getContrasena() . "' ";

        $datos = $this->conexion->myConnection()->query($sql);
        $i = 0;
        while ($filas = $datos->fetch_assoc()) {
            $i++;
        }

        if ($i > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerIdUsuario(Usuario $usuario): int {
        $sql = "SELECT * FROM Usuarios where nombreUsuario= '" . $usuario->getNombreUsuario() . "'"
                . " and contrasena='" . $usuario->getContrasena() . "' ";

        $datos = $this->conexion->myConnection()->query($sql);
         $usuario= new Usuario();
        while ($filas = $datos->fetch_assoc()) {
           $usuario->setId($filas["idUsuario"]);
        }
        
        return $usuario->getId();
    }

}
