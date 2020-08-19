<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/CRUDProducts/Entidades/Usuario.php');
require_once(__ROOT__ . '/CRUDProducts/Controlador/ControladorUsuario.php');

if (strtoupper($_SERVER['REQUEST_METHOD']) == "POST") {
    $usuario = new Usuario();
    $usuario->setNombreUsuario($_POST["usuario"]);
    $usuario->setContrasena($_POST["contrasena"]);
    $usuario->setRol($_POST["rol"]);
    $controlador = new ControladorUsuario($usuario);
}
?>

<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../CRUDProducts/css/style.css">
      
    </head>
    <body>
   
        <div class="container h-100 ">
            <div class="row h-100 justify-content-center align-items-center">
                <form action="index.php" method="POST" class="col-4" >
                    <div class="login100-form-avatar">
                        <img src="../CRUDProducts/img/enosa.png" width="170px" height="150px">
                    </div>
                    <div class="form-group">
                        <label>Usuario:</label>
                        <input type="text" class="form-control bg-light " name="usuario" placeholder="Escriba su Usuario">

                    </div>
                    <div class="form-group">
                        <label>Contraseña:</label>
                        <input type="password"  class="form-control bg-light" name="contrasena" placeholder="Escriba su Contraseña">

                    </div>
                    
                     <div>
                         <label>Soy Cliente</label>
                         <input type="radio" name="rol" value="2" />
                     </div>
                    <div>
                        <label> Soy Trabajador</label>
                        <input type="radio" name= "rol" value="1"/>
                    </div>
                    <div class="text-center" role="group" aria-label="Basic example">
                        <input class="login100-form-btn" type="submit" value="Ingresar" />
                    </div>
                   
                </form>
            </div>

        </div>
    </body>



</html>