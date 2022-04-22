<?php

    require_once "../conexion/conexion.php";
    require_once "../controlador/propietario.php";
    $conexion = conectarBD();

    $propietario = new propietario();

    switch ($_SERVER['REQUEST_METHOD']){
        
        case 'GET':
            if(isset($conexion, $_GET['id'])){
                $prop = $propietario->getPropietario($conexion, $_GET['id']);
                echo $prop;
            }
            else{
                $props = $propietario->getPropietarios($conexion);
                echo $props;
            }
            
            break;
    }

?>