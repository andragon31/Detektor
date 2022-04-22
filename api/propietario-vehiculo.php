<?php
    require_once "../conexion/conexion.php";
    require_once "../controlador/propietario-vehiculo.php";
    $conexion = conectarBD();

    $propVehiculo = new propietarioVehiculo();

    switch ($_SERVER['REQUEST_METHOD']){
        
        case 'GET':
            if(isset($conexion, $_GET['id'])){
                $marca = $marca->getgetMarcaVehiculo($_GET['id']);
                echo $marca;
            }
            else{
                $marcas = $marca->getMarcasVehiculo($conexion);
                echo $marcas;
            }
            
            break;
    }

?>