<?php

class propietarioVehiculo{
    
    
    function getPropietarioVehiculo($conexion, $id){

        $query = "SELECT placa FROM vehiculo_propietario WHERE identificacion = ".$id." and estado = true;";
        $resultado = pg_query($conexion,$query) or die ("error en la consulta");
        $arr = pg_fetch_all($resultado);

        $query = "SELECT placa
        FROM vehiculos
        WHERE placa not in (
        SELECT placa
        FROM vehiculo_propietario
        WHERE identificacion = ".$id."
        and estado = true
        );";
        $resultado = pg_query($conexion,$query) or die ("error en la consulta");
        $arr2 = pg_fetch_all($resultado);

        $arreglo['asignados'] = $arr;
        $arreglo['noasignados'] = $arr2;

        return json_encode($arreglo);
    }


    function ligarVehiculoPropietario($conexion, $data){

        
        $id_prop = $data['id_propietario'];
        $vehiculos = $data['vehiculos'];
        
        foreach($vehiculos as $vehiculo){

            //verificamos si existe el vehiculo ya asignado al propietario
            $select = "SELECT * FROM vehiculo_propietario 
            WHERE identificacion = '".$id_prop."' and placa = '".$vehiculo['placa']."';";
            $resultado = pg_query($conexion,$select) or die ("error en la consulta");
            $arr = pg_fetch_all($resultado);

            //Si ya existe un el vehiculo ligado actualiza el estatus a vigente 
            if($arr){

                $query = "UPDATE vehiculo_propietario
                        SET estado = true
                        WHERE identificacion = '".$id_prop."' and placa = '".$vehiculo['placa']."';";
                $resultado = pg_query($conexion,$query) or die ("error al actualizar el registro");
                $arr = pg_fetch_all($resultado);
                
            }
            //si no existe el vehiculo ligado al propietario se crea el registro
            else{

                $query = "INSERT INTO vehiculo_propietario
                (identificacion, placa, estado)
                VALUES ('".$id_prop."', '".$vehiculo['placa']."', true);";
                $resultado = pg_query($conexion,$query) or die ("error al crear el registro");
                $arr = pg_fetch_all($resultado);
                
            }
            
        }
        
        //actualizamos el estado de los vehiculos no seleccionados que existen en la tabla
        //obtengo la lista de todos los vehiculos
        $query = "SELECT placa FROM vehiculos;";
        $resultado = pg_query($conexion,$query) or die ("error en la consulta");
        $vehiculosall = pg_fetch_all($resultado);

        $placas = array();
        foreach($vehiculosall as $vehiculoall){
            $cont = 0;
            foreach($vehiculos as $vehiculo){
                if($vehiculo['placa'] === $vehiculoall['placa']){
                    $cont++;
                }
            }

            if($cont == 0){
                array_push($placas, $vehiculoall['placa']);
            }
        }
        
        //actualizamos los vehiculos no seleccionados a estado false
        foreach($placas as $pl){
            $query = "UPDATE vehiculo_propietario
                        SET estado = false
                        WHERE identificacion = '".$id_prop."' and placa = '".$pl."';";
            $resultado = pg_query($conexion,$query) or die ("error al actualizar el registro");
            $arr = pg_fetch_all($resultado);
        }
        
        
        return json_encode("exito al procesar");
    }
}


?>