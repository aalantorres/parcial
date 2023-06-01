<?php
class Vehiculo{
// int $codigo, $anioFabricacion
//float $costo, $porIncAnual
//string $descripcion
// boolean $activo
private $codigo;
private $costo;
private $anioFabricacion;
private $descripcion;
private $porcIncAnual;
private $activo;

public function __construct($codigo, $costo,$anioFabricacion,$descripcion,$porcIncAnual,$activo)
{
    $this -> codigo = $codigo;
    $this -> costo = $costo;
    $this -> anioFabricacion = $anioFabricacion;
    $this -> descripcion = $descripcion;
    $this -> porcIncAnual = $porcIncAnual;
    $this -> activo = $activo;
}

public function getCodigo(){
    return $this -> codigo;
}
public function getCosto(){
    return $this -> costo;
}
public function getAnioFabricacion(){
    return $this -> anioFabricacion;
}
public function getDescripcion(){
    return $this -> descripcion;
}
public function getPorcIncAnual(){
    return $this -> porcIncAnual;
}
public function getActivo(){
    return $this -> activo;
}
public function setCodigo($codigo){
    $this -> codigo = $codigo;
}
public function setCosto($costo){
    $this -> costo = $costo;
}
public function setAnioFabricacion($anioFabricacion){
    $this -> anioFabricacion = $anioFabricacion;
}
public function setDescripcion($descripcion){
    $this -> descripcion = $descripcion;
}
public function setPorcIncAnual($porcIncAnual){
    $this -> porcIncAnual = $porcIncAnual;
}
public function setActivo($activo){
    $this -> activo = $activo;
}

public function __toString()
{
    return "\n\n\nCodigo:".$this -> getCodigo(). "\nCosto:".$this -> getCosto().
    "\nAño fabricacion:".$this -> getAnioFabricacion(). "\nPorc Inc Anual:".$this -> getPorcIncAnual().
    "\nActivo:".$this -> getActivo();
}

/**
 * Metodo que retorna el precio de venta de un vehiculo si esta disponible, en caso contrario devuelve un numero menor a 0
 * @return float
 */
public function darPrecioVenta(){
    $_venta = -1;
    $_compra = $this -> getCosto();
    $anio = 2023 - $this -> getAnioFabricacion();
    $porc_inc_anual = $this -> getPorcIncAnual();
    $estaDisp = $this -> getActivo();
    $porc_inc_anual = $porc_inc_anual / 100;
    if($estaDisp){
        $_venta = $_compra + $_compra * ($anio * $porc_inc_anual);
    }
    return $_venta;
}
}

