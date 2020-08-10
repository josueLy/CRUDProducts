<?php

define('__ROOTCONTROLLER__', dirname(dirname(__FILE__)));
require_once(__ROOTCONTROLLER__.'/Modelo/ModeloUsuario.php');
require_once(__ROOTCONTROLLER__.'/Entidades/Usuario.php');

class ControladorUsuario {
  
    private $modeloUsuario;
    
    public function __construct(Usuario $usuario) {
        $this->modeloUsuario= new ModeloUsuario();
        if($this->login($usuario)){     
            header("Location: http://localhost/CRUDProducts/Vista/menu.html");
        }
    }
    
    
    public function login(Usuario $usuario):bool{
        
        return $this->modeloUsuario->login($usuario);
    }
}
