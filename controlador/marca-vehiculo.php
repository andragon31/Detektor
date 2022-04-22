<?php

class marcaVehiculo{

    function getMarcaVehiculo($conexion, $id){

        $query = "SELECT * FROM marca_vehiculo WHERE id = ".$id.";";
        $resultado = pg_query($conexion,$query) or die ("error en la consulta");
        $arr = pg_fetch_all($resultado);

        return json_encode($arr);
    }

    function getMarcasVehiculo($conexion){

        $query = "SELECT * FROM marca_vehiculo;";
        $resultado = pg_query($conexion,$query) or die ("error en la consulta");
        $arr = pg_fetch_all($resultado);

        return json_encode($arr);
    }
}

?>