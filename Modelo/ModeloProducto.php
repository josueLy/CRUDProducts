<?php

define('__ROOTMODEL__', dirname(dirname(__FILE__)));
require_once(__ROOTMODEL__ . '/Datos/Conexion.php');
require_once(__ROOTMODEL__ . '/Entidades/Producto.php');

class ModeloProducto {

    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    public function mostrar(): array {
        $sql = "SELECT * FROM PRODUCTOS WHERE estado=1";

        $datos = $this->conexion->myConnection()->query($sql);
        $productos = array();
        $i = 0;
        while ($filas = $datos->fetch_assoc()) {
            $producto = new Producto();
            $producto->setIdProducto($filas["idProducto"]);
            $producto->setDescripcion($filas["descripcion"]);
            $producto->setPrecio($filas["precio"]);
            $producto->setCantidad($filas["cantidad"]);
            $producto->setStockMax($filas["stockmax"]);
            $producto->setStockMin($filas["stockmin"]);
            $productos[$i] = $producto;
            $i++;
        }

        return $productos;
    }

    public function insertar(Producto $producto) {

        $sql = "INSERT INTO productos (descripcion,precio,cantidad,stockmin,stockmax,estado) "
                . "VALUES ('" . $producto->getDescripcion() . "','" . $producto->getPrecio() . "','" . $producto->getCantidad() . "','" . $producto->getStockMin() . "','" . $producto->getStockMax() . "',1)";

         if (mysqli_query($this->conexion->myConnection(), $sql)) {
            return "true";
        } else {
            return "Error: " . $sql . "<br>" . mysqli_error($this->conexion->myConnection());
        }
        mysqli_close($this->conexion->myConnection());
    }

    public function obtenerProducto($idProducto): Producto {
        $sql = "SELECT * FROM productos WHERE idProducto=" . $idProducto;

        $datos = $this->conexion->myConnection()->query($sql);

        $producto = new Producto();
        while ($filas = $datos->fetch_assoc()) {

            $producto->setIdProducto($filas["idProducto"]);
            $producto->setDescripcion($filas["descripcion"]);
            $producto->setPrecio($filas["precio"]);
            $producto->setCantidad($filas["cantidad"]);
            $producto->setStockMax($filas["stockmax"]);
            $producto->setStockMin($filas["stockmin"]);
        }
        return $producto;
    }
    

    public function actualizar(Producto $producto):string {
        $sql = "UPDATE Productos set descripcion='" . $producto->getDescripcion() . "',"
                . " precio='" . $producto->getPrecio() . "',"
                . " cantidad='" . $producto->getCantidad() . "',"
                . " stockmin='" . $producto->getStockMin() . "',"
                . " stockmax='" . $producto->getStockMax() . "' "
                . " WHERE idProducto='" . $producto->getIdProducto() . "'";

        if (mysqli_query($this->conexion->myConnection(), $sql)) {
            return "true";
        } else {
            return "Error: " . $sql . "<br>" . mysqli_error($this->conexion->myConnection());
        }
        mysqli_close($this->conexion->myConnection());
    }

    public function eliminar($idProducto) {
        $sql = "UPDATE productos set estado =0 where idProducto=" . $idProducto;

        if (mysqli_query($this->conexion->myConnection(), $sql)) {
            echo "elminado!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conexion->myConnection());
        }
        mysqli_close($this->conexion->myConnection());
    }

}
