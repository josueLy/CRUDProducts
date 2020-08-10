<?php


class Usuario {
 private $nombreUsuario;
 private $contrasena;
 
 
public function setNombreUsuario($nombreUsuario){
    $this->nombreUsuario=$nombreUsuario;
}
public function getNombreUsuario(){
    return $this->nombreUsuario;
}

public function setContrasena($contrasena){
    $this->contrasena=$contrasena;
}

public function getContrasena(){
    return $this->contrasena;
}
}
