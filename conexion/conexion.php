<?php

$servidor="localhost";
$usuario="root";
$pass="";
$base="arriendos";

$conexion= new mysqli($servidor,$usuario,$pass,$base);

if($conexion->connect_error){
    die("Conexion no establecida");
}
