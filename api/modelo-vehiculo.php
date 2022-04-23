<?php
    require_once "../conexion/conexion.php";
    require_once "../controlador/modelo-vehiculo.php";
    $conexion = conectarBD();

    $modeloVehiculo = new modeloVehiculo();

    switch ($_SERVER['REQUEST_METHOD']){
        
        case 'GET':
            if(isset($conexion, $_GET['id_marca'], $_GET['id_tipo'])){
                //return json_encode($_GET['id_marca']);
                $modelos = $modeloVehiculo->getModelosVehiculo($conexion, $_GET['id_marca'], $_GET['id_tipo']);
                echo $modelos;
            }
            break;
    }

?>