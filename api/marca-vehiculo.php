<?php
    require_once "../conexion/conexion.php";
    require_once "../controlador/marca-vehiculo.php";
    $conexion = conectarBD();

    $marca = new marcaVehiculo();

    switch ($_SERVER['REQUEST_METHOD']){
        
        case 'GET':
            if(isset($conexion, $_GET['id'])){
                $marca = $marca->getMarcaVehiculo($conexion, $_GET['id']);
                echo $marca;
            }
            else{
                $marcas = $marca->getMarcasVehiculo($conexion);
                echo $marcas;
            }
            
            break;
    }

?>