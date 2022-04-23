<?php
    require_once "../conexion/conexion.php";
    require_once "../controlador/propietario-vehiculo.php";
    $conexion = conectarBD();

    $propVehiculo = new propietarioVehiculo();

    switch ($_SERVER['REQUEST_METHOD']){
        
        case 'GET':
            if(isset($conexion, $_GET['id'])){
                $propveh = $propVehiculo->getPropietarioVehiculo($conexion, $_GET['id']);
                echo $propveh;
            }
            
            break;

        case 'POST':
            $_POST = json_decode(file_get_contents('php://input'), true);
            if(isset($conexion, $_POST)){
                $propveh = $propVehiculo->ligarVehiculoPropietario($conexion, $_POST);
                echo $propveh;
            }
            
            break;
    }



?>