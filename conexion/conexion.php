<?php

function conectarBD()
{
    $host = "host=localhost";
    $port = "port=5432";
    $bdname = "dbname=detektor";
    $user = "user=postgres";
    $password = "password=horda10";

    $bd = pg_connect("$host $port $bdname $user $password");

    if(!$bd)
    {
        echo "error:".pg_last_error;        
    }
    else
    {
        return $bd;
    }
}

?>