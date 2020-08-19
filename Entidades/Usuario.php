<?php

class Usuario {

    private $id;
    private $nombreUsuario;
    private $contrasena;
    private $rol;
    
    
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function setRol($rol) {
        return $this->rol = $rol;
    }
    
    public function getRol(){
        return $this->rol;
    }

}
