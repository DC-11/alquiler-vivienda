<?php
require_once ('conexion/conexion.php');

$cedula =$_POST['cedula'];
$nombre =$_POST['nombre'];
$telefono_convencional=$_POST['tconvencional'];
$celular =$_POST['celular'];
$persona_contacto =$_POST['personac'];
$telefono_contacto =$_POST['tpersona'];


 $sql="INSERT INTO inquilinos VALUES($cedula, '$nombre', $telefono_convencional, $celular, '$persona_contacto', $telefono_contacto)";

$consulta = mysqli_query($conexion,$sql);
if($consulta){
     header("location: arriendo.php");
     echo '<label>Se ha ingresado inquilino con exito</label>';
}

 else {
    echo '<img src="images/mantenimiento.png">';
}