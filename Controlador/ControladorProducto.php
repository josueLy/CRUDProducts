<?php

 define('__ROOTCONTROLLER__', dirname(dirname(__FILE__)));
 require_once(__ROOTCONTROLLER__.'/Modelo/ModeloProducto.php');
 require_once(__ROOTCONTROLLER__.'/Entidades/Producto.php');

class ControladorProducto {
    
    private $modelo;
    
    public function __construct() {
        $this->modelo = new ModeloProducto();
    }
    
    public function mostrar():array{
        
        return $this->modelo->mostrar();
    }
    
    public function obtenerProducto($idProducto):Producto{
        return $this->modelo->obtenerProducto($idProducto);
    }


    public function insertar(Producto $producto): string{        
       return $this->modelo->insertar($producto);
    }
    
    public function actualizar(Producto $producto): string{
        return $this->modelo->actualizar($producto);
    }
    
    public function eliminar ($idProducto){
        $this->modelo->eliminar($idProducto);
    }
}
