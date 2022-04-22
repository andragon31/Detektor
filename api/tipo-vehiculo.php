<?php
    require_once "../conexion/conexion.php";
    require_once "../controlador/tipo-vehiculo.php";
    $conexion = conectarBD();

    $tipoVehiculo = new tipoVehiculo();

    switch ($_SERVER['REQUEST_METHOD']){
        
        case 'GET':
            if(isset($conexion, $_GET['id'])){
                $tipo = $tipoVehiculo->getTipoVehiculo($conexion, $_GET['id']);
                echo $tipo;
            }
            else{
                $tipos = $tipoVehiculo->getTiposVehiculo($conexion);
                echo $tipos;
            }
            
            break;
    }

?>