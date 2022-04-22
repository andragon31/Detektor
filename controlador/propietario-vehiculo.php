<?php

class propietarioVehiculo{

    function getPropietarioVehiculo($conexion, $id){

        $query = "SELECT * FROM vehiculo_propietario WHERE identificacion = ".$id.";";
        $resultado = pg_query($conexion,$query) or die ("error en la consulta");
        $arr = pg_fetch_all($resultado);
        echo json_encode($arr);

        return json_encode($arr);
    }

    function ligarVehiculoPropietario($conexion, $data){
        
        
    }
}


?>