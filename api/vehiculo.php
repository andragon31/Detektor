<?php

    require_once "../conexion/conexion.php";
    require_once "../controlador/vehiculo.php";

    $conexion = conectarBD();
    $vehiculo = new vehiculo();

    switch ($_SERVER['REQUEST_METHOD']){
        
        case 'GET':
            if(isset($_GET['placa'])){
                $vehi = $vehiculo->getVehiculo($conexion, $_GET['placa']);
                echo $vehi;
            }
            else{
                $vehis = $vehiculo->getVehiculos($conexion);
                echo $vehis;
            }
            
            break;

        case 'POST':
            $_POST = json_decode(file_get_contents('php://input'), true);
            $vehi = $vehiculo->crearVehiculo($conexion, $_POST);
            echo $vehi;
            
            break;

        case 'PUT':
            $_PUT = json_decode(file_get_contents('php://input'), true);
            $vehi = $vehiculo->actualizarVehiculo($conexion, $_PUT);
            echo $vehi;
            
            break;
        case 'DELETE':
            if(isset($_DELETE['placa'])){
                $vehi = $vehiculo->eliminarVehiculo($conexion, $_DELETE['placa']);
                echo $vehi;
            }
            
            break;
    }

?>