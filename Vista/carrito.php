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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
           
         $(document).ready(function(){
            $("input").keyup(function() {
                
             var form = $(this).parents("#form");
             var i =0;
             var tamanio= $("#count").val();
             alert(tamanio);
             for(var i=1; i<=tamanio;i++){
                if($("#cantidad"+i).val()!=""){ 
                   
                 var check=true;
                 break;
                }
             }
                          
             if(check) {
                 
                 $("button").prop("disabled", false);
             }
             else {
                 $("button").prop("disabled", true);
             }
             });
           
        });
          
        </script>
        
         <?php
        define('__ROOT__', dirname(dirname(__FILE__)));
         require_once(__ROOT__ . '/Entidades/Producto.php');
         require_once(__ROOT__ . '/Entidades/Venta.php');
         require_once(__ROOT__ . '/Controlador/ControladorProducto.php');
         require_once(__ROOT__ . '/Controlador/ControladorVenta.php');


         $controlador = new ControladorProducto();
         $listproductos = $controlador->mostrar();


         $cantidades = array();
         $productos = array();
         if (strtoupper($_SERVER['REQUEST_METHOD']) == "POST") {
             $i = 1;
             $j = 0;
             foreach ($controlador->mostrar() as $product) {
                 $indiceCantidad = "cantidad$i";
                 $indiceProducto = "idProducto$i";
                 $cantidad = $_POST[$indiceCantidad];
                 $idProducto = $_POST[$indiceProducto];


                 if ($cantidad != NULL) {
                     $cantidades[$j] = $cantidad;
                     $productos[$j] = $idProducto;
                 }
                 $i++;
                 $j++;
             }
             $controladorVenta = new ControladorVenta();
             $flagGuardo = $controladorVenta->registrarVenta($cantidades, $productos);

             if ($flagGuardo == "true") {
                 echo "<script>alert('Registro Editado con Éxito');</script>";
             } else {
                 echo '<script>alert("' . $flagGuardo . '");</script>';
             }
         }
         ?>
    </head>
    <body>        
        <form action="carrito.php?confirmacion=0" method="POST">
        <div class="table-responsive">
           
            <table class="table">
            <thead>
                <tr class="table-success">
                    <th class="table-info text-light">Descripcion</th>
                    <th class="text-center text-light">Precio</th>
                    <th class="text-center text-light">Cantidad</th>                   
                    <th class="text-center text-light"> <button disabled="true" ><img src="../img/shopping_cart.png" width="30px" height="30px" /></button></th>
           
                </tr>
            </thead>
            <tbody>
                <?php 
                $i =1;
                foreach($controlador->mostrar() as $producto): ?>
                <tr>
                    <?php echo "<input type='hidden' name='idProducto$i' value='".$producto->getIdProducto()."'>" ?>
                    <td  class="table-info text-center text-muted"><?php echo $producto->getDescripcion(); ?></td>
                    <td class="table-light text-center text-muted"><?php echo $producto->getPrecio(); ?></td>
                    <td class="table-info text-center text-muted"><?php echo "<input type='number' id='cantidad$i' name='cantidad$i' >" ?></td>
                    <td class="table-primary text-center"></td>
                        <?php $i++?>
                </tr> 
                <?php endforeach; ?>
            </tbody>
           
        </table>
              <?php echo "<input type='hidden' id='count' value='". count($listproductos)."'>" ?>
        </div>
        </form>
    </body>
</html>
