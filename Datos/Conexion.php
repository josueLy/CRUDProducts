<?php
class Conexion{
    
    function myConnection(){
        $servername = "localhost";
        $database = "productosbd";
        $username = "root";
        $password = "";

       $conn=  new mysqli($servername, $username, $password, $database);
       if(!$conn){
           
            echo "Conexión Errónea";
       } else{
           return $conn;
       }
       
    }



}
