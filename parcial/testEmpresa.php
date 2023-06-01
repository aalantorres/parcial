<?php
include_once('venta.php');
include_once('concesionaria.php');
include_once('vehiculo.php');
include_once('cliente.php');
$objCliente1 = new Cliente("Pepe", "Martinez", "Baja", "DNI", 423333);
$objCliente2 = new Cliente("Martin", "Martinez", "Alta", "DNI", 123456);
$vehiculo1 = new Vehiculo(11,50000,2020,"Volkswagen Polo POLO TRENDLINE",85,true);
$vehiculo2 = new Vehiculo(12,10000,2021,"RAM 1500 Laramie",70,true);
$vehiculo3 = new Vehiculo(13,10000,2022,"jeep Renegade 1.8 Sport", 55, false);
$vehiculos [] = $vehiculo1;
$vehiculos [] = $vehiculo2;
$vehiculos [] = $vehiculo3;
$clientes [] = $objCliente1;
$clientes [] = $objCliente2;
$ventas = [];
$empresa = new Concesionaria("Alta Gama", "Av Argentina 123", $clientes,$vehiculos,$ventas);
$venta1 = $empresa -> registrarVenta([11,12,13], $objCliente2);
$venta4 = $empresa -> registrarVenta([0],$objCliente2);
$venta2 = $empresa -> registrarVenta([2], $objCliente1);
$ventasCliente1 =  $empresa -> retornarVentasXCliente("DNI",423333);
$ventasCliente2 = $empresa -> retornarVentasXCliente("DNI",123456);
echo $empresa;