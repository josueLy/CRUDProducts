<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
      <div class="container h-100 bg-light">
            <div class="row h-100 justify-content-center align-items-center">
                <form action="formularioRegistro.php" method="POST" class="col-4">

                    <div class="form-group" >
                        <label>Descripción: </label>
                        <input class="form-control"type="text" name="descripcion" placeholder="Escriba una Descripcion" /></td>

                    </div>
                    <div class="form-group">       
                        <label>Precio: </label>
                        <input class="form-control" type="number" step="any" name="precio"  placeholder="Escriba un precio"/>
                    </div>        
                    <div class="form-group">  
                        <label>Cantidad:</label>
                        <input class="form-control" type="number" name="cantidad"  placeholder="Escriba la cantidad"/></td>
                    </div>             

                    <div class="form-group"> 
                        <label>Stock Mínimo:</label>
                        <input class="form-control" type="number" name="stockmin"  placeholder="Escriba Stock Mínimo"/></td>
                    </div>

                    <div class="form-group">
                        <label>Stock Máximo:</label>
                        <input  class="form-control" type="number" name="stockmax"   placeholder="Escriba Stock Máximo"/></td>

                    </div>


                    <input type="submit"  class="login100-form-btn" value="Registrar Producto"/>

                    
                    
                </form>
            </div>
        </div>
        <?php
        define('__ROOT__', dirname(dirname(__FILE__)));
        require_once(__ROOT__ . '/Entidades/Producto.php');
        require_once(__ROOT__ . '/Controlador/ControladorProducto.php');
        
        $controlador = new ControladorProducto();
        $producto = new Producto();
        if (isset($_POST["descripcion"])) {

            $producto->setDescripcion($_POST["descripcion"]);
            $producto->setPrecio($_POST["precio"]);
            $producto->setCantidad($_POST["cantidad"]);
            $producto->setStockMin($_POST["stockmin"]);
            $producto->setStockMax($_POST["stockmax"]);
            $flagGuardo=$controlador->insertar($producto);
            if ($flagGuardo == "true") {
                echo "<script>alert('Registro Guardado con Éxito');</script>";
            } else {
                echo '<script>alert("' . $flagGuardo . '");</script>';
            }
        }
?>
    </body>
</html>
