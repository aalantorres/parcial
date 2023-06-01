<?php
class Cliente {
    //string $nombre, $apellido, $estado, $tipo
    //int $nroDoc
    private $nombre;
    private $apellido;
    private $estado;
    private $tipo;
    private $nroDoc;

    public function __construct($nombre, $apellido, $estado, $tipo, $nroDoc)
    {
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> estado = $estado;
        $this -> tipo = $tipo;
        $this -> nroDoc = $nroDoc;
    }

    public function getNombre (){
        return $this -> nombre;
    }
    public function getApellido (){
        return $this -> apellido;
    }
    public function getEstado (){
        return $this -> estado;
    }
    public function getTipo (){
        return $this -> tipo;
    }
    public function getNroDoc (){
        return $this -> nroDoc;
    }
    public function setNombre($nombre){
        $this -> nombre = $nombre;
    }
    public function setApellido($apellido){
        $this -> apellido = $apellido;
    }
    public function setEstado($estado){
        $this -> estado = $estado;
    }
    public function setTipo($tipo){
        $this -> tipo = $tipo;
    }
    public function setNroDoc($nroDoc){
        $this -> nroDoc = $nroDoc;
    }
    public function __toString()
    {
        return "\n\n\nNombre:".$this -> getNombre(). "\nApellido:".$this -> getApellido().
        "\nEstado:".$this -> getEstado(). "\nTipo:".$this -> getTipo(). "\nNro Documento:".$this -> getNroDoc();
    }
}
