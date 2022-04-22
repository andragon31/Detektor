<?php

class tipoVehiculo{

    function getTipoVehiculo($conexion, $id){

        $query = "SELECT * FROM tipo_vehiculo WHERE id = ".$id.";";
        $resultado = pg_query($conexion,$query) or die ("error en la consulta");
        $arr = pg_fetch_all($resultado);
        echo json_encode($arr);

        return json_encode($arr);
    }

    function getTiposVehiculo($conexion){

        $query = "SELECT * FROM tipo_vehiculo;";
        $resultado = pg_query($conexion,$query) or die ("error en la consulta");
        $arr = pg_fetch_all($resultado);

        return json_encode($arr);
    }
}

?>