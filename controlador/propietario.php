<?php

class propietario{

    function getPropietario($conexion, $id){

        $query = "SELECT * FROM propietario WHERE identificacion = ".$id.";";
        $resultado = pg_query($conexion,$query) or die ("error en la consulta");
        $arr = pg_fetch_object($resultado);

        return json_encode($arr);
    }

    function getPropietarios($conexion){
        
        $query = "SELECT * FROM propietario;";
        $resultado = pg_query($conexion,$query) or die ("error en la consulta");
        $nr=pg_num_rows($resultado);
        $filas = pg_fetch_array($resultado);
        $arr = pg_fetch_all($resultado);
        
        return json_encode($arr);
    }
}

?>