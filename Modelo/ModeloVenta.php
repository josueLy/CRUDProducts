<?php

define('__ROOTSALE__', dirname(dirname(__FILE__)));
require_once(__ROOTSALE__ . '/Datos/Conexion.php');
require_once(__ROOTSALE__ . '/Entidades/Venta.php');
require_once(__ROOTSALE__ . '/Modelo/ModeloProducto.php');
class ModeloVenta {

    private $conexion;
    private $modeloProducto;
    function __construct() {
        $this->conexion = new Conexion();
        $this->modeloProducto = new ModeloProducto();
    }

    public function registrarVenta(array $cantidades, array $productos): String {
        session_start();
        $cliente = $_SESSION["usuario"];
        $productosReservados = array();
        if (strtoupper($_SERVER['REQUEST_METHOD']) == "POST") {
            $i = 0;

            foreach ($cantidades as $cantidad) {

                if ($cantidad != NULL) {
                    $producto = $this->modeloProducto->obtenerProducto($productos[$i]);
                    $producto->setCantidad($cantidad);
                    $productosReservados[$i] = $producto;
                }
                $i++;
            }
        }
        $fecha= getdate();
        $subtotal = 0;
        foreach ($productosReservados as $producto) {
            $subtotal = $subtotal + $producto->getPrecio();
        }
       
        $total = (float)$subtotal + (float)($subtotal * 0.18);
        $round_subtotal= round($subtotal,2);
        $round_total= round($total,2);
        $venta = new Venta($cliente, $productosReservados, $fecha, $round_subtotal, $round_total);
        $flag_insertado=true;
        try {
            $sql = "INSERT INTO ventas (idUsuario,subtotal,total) "
                    . "VALUES ('" . $venta->getCliente() . "','" . $venta->getSubtotal() . "','" . $venta->getTotal() . "')";
            
            if (mysqli_query($this->conexion->myConnection(), $sql)) {
                $consulta = "SELECT MAX(idVenta) as idVenta FROM ventas";
                $datos = $this->conexion->myConnection()->query($consulta);

                while ($filas = $datos->fetch_assoc()) {
                    $idVenta = $filas["idVenta"];
                }
                foreach ($productosReservados as $productoReservado) {
                    $sql = "INSERT INTO detalleventa (idVenta,idProducto,cantidad) values('".$idVenta."','" . $productoReservado->getIdProducto() . "','" . $productoReservado->getCantidad() . "')";
                    if (mysqli_query($this->conexion->myConnection(), $sql)) {
                        //
                    } else {
                       $flag_insertado=false;
                       break;
                    }
                }
                if($flag_insertado)
                    return "true";
                else 
                    return "Error: " . $sql . "<br>" . mysqli_error($this->conexion->myConnection());
            } else {
                return "Error: " . $sql . "<br>" . mysqli_error($this->conexion->myConnection());
            }
            mysqli_close($this->conexion->myConnection());
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

}
