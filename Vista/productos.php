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
    </head>
    <body>
        
        <?php
            define('__ROOT__', dirname(dirname(__FILE__)));
            require_once(__ROOT__.'/Entidades/Producto.php');
            require_once(__ROOT__.'/Controlador/ControladorProducto.php');
            
            $controlador = new ControladorProducto();
            $productos= $controlador->mostrar();
             if ($_GET["idProducto"]>0){
                 $controlador->eliminar($_GET["idProducto"]);
            }
            
        ?>
        <a  class="text-warning" href="../Vista/formularioRegistro.php">Agregar Nuevo Producto</a>
        <div class="table-responsive">
            <table class="table">
            <thead>
                <tr class="table-success">
                    <th class="table-info text-light">Descripcion</th>
                    <th class=" text-center text-light">Precio</th>
                    <th class="text-center text-light">Cantidad</th>
                    <th class="text-center text-light">Stock Máximo</th>
                    <th class=" text-center text-light" >Stock Mínimo</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($controlador->mostrar() as $producto): ?>
                <tr>
                    <td  class="table-info text-center text-muted"><?php echo $producto->getDescripcion(); ?></td>
                    <td class="table-light text-center text-muted"><?php echo $producto->getPrecio(); ?></td>
                    <td class="table-info text-center text-muted"><?php echo $producto->getCantidad();?></td>
                    <td class="table-light text-center text-muted"><?php echo $producto->getStockMax();?></td>
                    <td class="table-info text-center text-muted"><?php echo $producto->getStockMin();?></td>
                    <td class="table-primary text-center"><?php echo '<a href="formularioEdicion.php?id='.$producto->getIdProducto().'"><img src="../img/edit.jpg" width="30px" height="30px" /></a>'?></td>
                    
                    <td class="table-primary text-center"><?php echo '<a href="productos.php?idProducto='.$producto->getIdProducto().'" ><img src="../img/delete.jpg" width="30px" height="30px" />'?></td>
                </tr> 
                <?php endforeach; ?>
            </tbody>
           
        </table>
            
        </div>
    </body>
</html>
