<?php
define('__ROOTMODEL__', dirname(dirname(__FILE__)));
require_once(__ROOTMODEL__ . '/Entidades/Usuario.php');
require_once(__ROOTMODEL__ . '/Entidades/Producto.php');

class Venta {
    
    private $cliente;
    private $productos;
    private $fecha;
    private $subtotal;
    private $total;
    
    function __construct($cliente,array $productos,$fecha,$subtotal,$total) {
        $this->cliente=$cliente;
        $this->productos=$productos;
        $this->fecha=$fecha;
        $this->subtotal=$subtotal;
        $this->total=$total;
    }
    
    public function getCliente() {
        return $this->cliente;
    }

    public function getProductos() {
        return $this->productos;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getSubtotal() {
        return $this->subtotal;
    }

    public function getTotal() {
        return $this->total;
    }

}
