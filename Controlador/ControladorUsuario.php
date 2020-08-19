<?php

define('__ROOTCONTROLLER__', dirname(dirname(__FILE__)));
require_once(__ROOTCONTROLLER__.'/Modelo/ModeloUsuario.php');
require_once(__ROOTCONTROLLER__.'/Entidades/Usuario.php');

class ControladorUsuario {
  
    private $modeloUsuario;
    
    public function __construct(Usuario $usuario) {
        $this->modeloUsuario= new ModeloUsuario();
        if($this->login($usuario)){
            session_start();
            $usuario->setId($this->obtenerIdUsuario($usuario));
            $_SESSION["usuario"]=$usuario->getId();
            header("Location: http://localhost/CRUDProducts/Vista/menu.php?rol=".$usuario->getRol());
        }
    }
    
    
    public function login(Usuario $usuario):bool{
        
        return $this->modeloUsuario->login($usuario);
    }
    
    public function obtenerIdUsuario(Usuario $usuario):int{
        return $this->modeloUsuario->obtenerIdUsuario($usuario);
    }
    
}
