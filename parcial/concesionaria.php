<?php 
class Concesionaria {
    //int $denominacion
    // string $direccion
    // array $colClientes, $colVehiculos, $colVenta
    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colVehiculos;
    private $colVenta;

    public function __construct($denominacion,$direccion,$colClientes,$colVehiculos,$colVenta)
    {
        $this -> denominacion = $denominacion;
        $this -> direccion = $direccion;
        $this -> colClientes = $colClientes;
        $this -> colVehiculos = $colVehiculos;
        $this -> colVenta = $colVenta;
    }

    public function getDenominacion(){
        return $this -> denominacion;
    }
    public function getDireccion(){
        return $this -> direccion;
    }
    public function getColClientes(){
        return $this -> colClientes;
    }
    public function getColVehiculos(){
        return $this -> colVehiculos;
    }
    public function getColventa(){
        return $this -> colVenta;
    }
    public function setDenominacion($denominacion){
        $this -> denominacion = $denominacion;
    }
    public function setDireccion($direccion){
        $this -> direccion = $direccion;
    }
    public function setColClientes($colClientes){
        $this -> colClientes = $colClientes;
    }
    public function setColVehiculos($colVehiculos){
        $this -> colVehiculos = $colVehiculos;
    }
    public function setColVenta($colVenta){
        $this -> colVenta = $colVenta;
    }
    /**
     * Metodo que retorna un mensaje con la coleccion clientes
     * @return string
     */
    public function mostrarColClientes(){
        $clientes = $this -> getColClientes();
        $mensaje = "";
        foreach ($clientes as $cliente){
            $mensaje = $mensaje. $cliente;
        }
        return $mensaje;
    }
    /**
     * Metodo que retorna un mensaje con la coleccion vehiculos
     * @return string
     */
    public function mostraColVehiculos(){
        $vehiculos = $this -> getColVehiculos();
        $mensaje = "";
        foreach ($vehiculos as $vehiculo){
            $mensaje = $mensaje. $vehiculo;
        }
        return $mensaje;
    }
    /**
     * Metodo que retorna un mensaje con la coleccion ventas
     * @return string
     */
    public function mostrarColVenta(){
        $ventas = $this -> getColventa();
        $mensaje = "";
        foreach ($ventas as $venta){
            $mensaje = $mensaje. $venta;
        }
        return $mensaje;
    }

    public function __toString()
    {
        return "\nDenominacion:".$this ->getDenominacion(). "\nDireccion:".$this -> getDireccion().
        "\nColeccion Clientes:".$this -> mostrarColClientes(). "\nColeccion Vehiculos:".$this -> mostraColVehiculos().
        "\nColeccion Ventas:".$this -> mostrarColVenta();
    }
    /**
     * Metodo que recibe por parametro el codigo de un vehiculo y retorna el vehiculo que coincide con el
     * @param int $codVehiculo
     * @return object
     */
    public function retornarVehiculo ($codVehiculo){
        $vehiculos = $this -> getColVehiculos();
        $i = 0;
        $vehiculoCod = null;
        while ($vehiculoCod == null && $i < count($vehiculos)){
            $vehiculo = $vehiculos[$i];
            if($codVehiculo == $vehiculo -> getCodigo()){
                $vehiculoCod = $vehiculo;
            }
        }
        return $vehiculoCod;
    }

    /**
     * Metodo que recibe una coleccion de codigos de vehiculos, se busca el objeto vehiculo
     * correspondiente al codigo y se incorpora a la coleccion vehiculos de la instancia venta
     * @param array $colCodigosVehiculos
     * @param object $objCliente
     * @return float
     */
    public function registrarVenta($colCodigosVehiculos, $objCliente){
        $coleccionVehiculos = $this -> getColVehiculos();
        $ventas = $this -> getColventa();
        $nroVenta = count($ventas);
        $venta = new Venta ($nroVenta, "12/03", $objCliente, null, 0);
        foreach ($colCodigosVehiculos as $codigo){
            $i = 0;
            $encontrado = false;
            while($i < count($coleccionVehiculos) && !$encontrado){
                $vehiculo = $coleccionVehiculos[$i];
                if($vehiculo -> getCodigo() == $codigo && $objCliente -> getEstado() != "Baja"){
                    $venta -> incorporarVehiculo($vehiculo);
                    $encontrado = true;
                }
                $i++;
            }
        }
        $precioFinal = $venta -> getPrecioFinal();
        $ventas [] = $venta;
        $this -> setColVenta($ventas);
        return $precioFinal;
    }

    /**
     * Metodo que recibe por parametro el tipo y numero de documento de un cliente y
     * retorna una coleccion con las ventas realizadas al cliente
     * @param string $tipo
     * @param int $numDoc
     * @return array
     */
    public function retornarVentasXCliente($tipo,$numDoc){
        $ventas = $this -> getColventa();
        $ventasCliente = [];
        foreach ($ventas as $venta){
            if($venta -> datosCliente($tipo, $numDoc)){
                $ventasCliente []= $venta;
            }
        }
        return $ventasCliente;
    }
}