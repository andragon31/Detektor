<?php

class vehiculo{

    function getVehiculo($conexion, $placa){

        $query = "SELECT * FROM vehiculos WHERE placa = '".$placa."';";
        $resultado = pg_query($conexion,$query) or die ("error en la consulta");
        $arr = pg_fetch_all($resultado);

        return json_encode($arr);
    }

    function getVehiculos($conexion){

        $query = "SELECT * FROM vehiculos;";
        $resultado = pg_query($conexion,$query) or die ("error en la consulta");
        $arr = pg_fetch_all($resultado);

        return json_encode($arr);
    }

    function crearVehiculo($conexion, $data){

        $query = "INSERT INTO vehiculos(
            placa, vin, linea, cilindrada, color, chasis, tipo, modelo, marca)
            VALUES ('".$data['placa']."', '".$data['vin']."', ".$data['linea'].", ".$data['cilindrada'].", 
            '".$data['color']."', '".$data['chasis']."', ".$data['id_tipo'].", ".$data['id_modelo'].", ".$data['id_marca'].");";
        $resultado = pg_query($conexion,$query) or die ("error al crear");
        $arr = pg_fetch_all($resultado);

        return json_encode($arr);
        
    }

    function actualizarVehiculo($conexion, $data){

        $query = "UPDATE vehiculos
        SET vin= '".$data['vin']."', linea= ".$data['linea'].", cilindrada= ".$data['cilindrada'].", 
        color= '".$data['color']."', chasis= '".$data['chasis']."', tipo=".$data['id_tipo'].", 
        modelo=".$data['id_modelo'].", marca=".$data['id_marca']."
        WHERE placa = '".$data['placa']."';";
        $resultado = pg_query($conexion,$query) or die ("error al actualizar");
        $arr = pg_fetch_all($resultado);

        return json_encode($arr);
    }

    function eliminarVehiculo($conexion, $placa){
        echo $placa;

        $query = "DELETE FROM vehiculos
                 WHERE placa = '".$placa."';";
        $resultado = pg_query($conexion,$query) or die ("error en la consulta");
        $arr = pg_fetch_all($resultado);

        return json_encode($arr);
    }
}

?>