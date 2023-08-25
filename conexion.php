<?php

    //VARIABLES  ?nombreVariable;
    //Para conexión es necesario 4 parámetros que son:
//Servidor
$servidor = "localhost";
//Usuario
$user="root";
//Contraseña
$password="";
//Nombre Base de Datos
$basedatos="crudphp";    

//Como pasamos estas variables

$conexion= new mysqli($servidor,$user,$password,$basedatos); //la conexion está lista

//COMPROVAR SI EXISTE ALGÚN ERROR
if($conexion -> connect_errno)
{
    echo "Nuestra conexion presenta fallas";
    exit();
}


?>