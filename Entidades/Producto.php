<?php

class Producto{

private $idProducto;
private $descripcion;
private $precio;
private $cantidad;
private $stockMin;
private $stockMax;

public function setIdProducto($idProducto){
    $this->idProducto=$idProducto;
}
public function getIdProducto(){
    return $this->idProducto;
}

public function setDescripcion($descripcion){
    $this->descripcion=$descripcion;
}

public function getDescripcion(){
    return $this->descripcion;
}

public function setPrecio($precio){
    $this->precio= $precio;
    
}
public function getPrecio(){
    return $this->precio;
}

public function  setCantidad($cantidad){
    $this->cantidad=$cantidad;
}

public function getCantidad(){
    return $this->cantidad;
}

public function setStockMin($stockMin){
    $this->stockMin=$stockMin;
}

public function getStockMin(){
    return $this->stockMin;
}

public function setStockMax($stockMax){
    $this->stockMax=$stockMax;
}

public function getStockMax(){
    return $this->stockMax;
}
    
}
