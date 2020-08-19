<?php

define('__ROOTCONTROLLERSALE__', dirname(dirname(__FILE__)));
require_once(__ROOTCONTROLLERSALE__ . '/Modelo/ModeloVenta.php');
require_once(__ROOTCONTROLLERSALE__ . '/Entidades/Venta.php');

class ControladorVenta {

    private $modelo;

    public function __construct() {
        $this->modelo = new ModeloVenta();
    }

    public function registrarVenta(array $cantidades, array $productos) :String{
        return $this->modelo->registrarVenta($cantidades, $productos);
    }

}
