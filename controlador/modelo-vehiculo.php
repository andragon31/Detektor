<?php

class modeloVehiculo{

    function getModelosVehiculo($conexion, $id_marca, $id_tipo){

        $query = "SELECT * FROM modelo_vehiculo WHERE id_marca = ".$id_marca." and id_tipo = ".$id_tipo.";";
        $resultado = pg_query($conexion,$query) or die ("error en la consulta");
        $arr = pg_fetch_all($resultado);

        return json_encode($arr);
    }
}

?>