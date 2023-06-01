<?php
class Venta {
    //int $numero
    //float $precioFinal
    //object $refCliente
    //array $colVehiculos
    //string $fecha
    private $numero;
    private $fecha;
    private $refCliente;
    private $colVehiculos = [];
    private $precioFinal;

    public function __construct($numero, $fecha, $refCliente, $colVehiculos,$precioFinal)
    {
        $this -> numero = $numero;
        $this -> fecha = $fecha;
        $this -> refCliente = $refCliente;
        $this -> colVehiculos = $colVehiculos;
        $this -> precioFinal = $precioFinal;
    }
    public function getNumero (){
        return $this -> numero;
    }
    public function getFecha (){
        return $this -> fecha;
    }
    public function getRefCliente (){
        return $this -> refCliente;
    }
    public function getColVehiculos (){
        return $this -> colVehiculos;
    }
    public function getPrecioFinal (){
        return $this -> precioFinal;
    }
    public function setNumero($numero){
        $this -> numero = $numero;
    }
    public function setFecha($fecha){
        $this -> fecha = $fecha;
    }
    public function setRefCliente($refCliente){
        $this -> refCliente = $refCliente;
    }
    public function setColVehiculos($colVehiculos){
        $this -> colVehiculos = $colVehiculos;
    }
    public function setPrecioFinal($precioFinal){
        $this -> precioFinal = $precioFinal;
    }
    /**
     * metodo que devuelve un mensaje con la coleccion de vehiculos
     * @return string
     */
    public function motrarColVehiculos (){
        $vehiculos = $this ->getColVehiculos();
        $mensaje = "";
        if($vehiculos != null){
        foreach ($vehiculos as $vehiculo){
            $mensaje = $mensaje. $vehiculo;
        }
    }
        return $mensaje;
    }

    public function __toString()
    {
        return "\n\n\nNumero:".$this -> getNumero(). "\nFecha:".$this -> getFecha().
        "\nRef Cliente:".$this -> getRefCliente(). "\nColeccion Vehiculos:".$this -> motrarColVehiculos().
        "\nPrecio final:".$this -> getPrecioFinal();
    }

    /**
     * Metodo que recibe por parametro un objeto vehiculo y lo incorpora a la coleccion de vehiculos de la venta
     * si es posible
     * @param object $objVehiculo
     */
    public function incorporarVehiculo($objVehiculo){

        $vehiculos = $this -> getColVehiculos();
        $precio = $objVehiculo -> darPrecioVenta();
        if ($precio > 0){
            $vehiculos [] = $objVehiculo;
            $precioFinal = $this -> getPrecioFinal() + $precio;
            $this -> setPrecioFinal($precioFinal);
        }
    }
    /**
     * Metodo que recibe por parametro un tipo y numero de documento y si coincide devuelve true
     * @param string $tipo
     * @param int $nroDoc
     * @return boolean
     */
    public function datosCliente ($tipo, $nroDoc){
        $coincide = false;
        $cliente = $this ->getRefCliente();
        if($tipo == $cliente -> getTipo() && $nroDoc == $cliente -> getNroDoc()){
            $coincide = true;
        }
        return $coincide;
    }
}