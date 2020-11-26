<?php
require_once ('conexion/conexion.php');
$nombre =$_POST['inquilino'];
$sitio =$_POST['sitio'];
$fecha_contrato=$_POST['fechainicio'];
$numero_meses=$_POST['numeroMeses'];
$garantia =$_POST['garantia'];
$xmes =$_POST['xmes'];

$totalpago = $numero_meses * $xmes;
$duracion_fecha = date("y-m-d", strtotime("$inicio + $numero_meses months"));


 $sql="INSERT INTO arriendo VALUES('$nombre','$sitio','$fecha_contrato','$duracion_fecha',$garantia,$xmes,$totalpago)";

$consulta = mysqli_query($conexion,$sql);
if($consulta){
     header("location: consulta.php");
     //echo '<label>Se ha ingresado inquilino con exito</label>';
}

 else {
    echo '<img src="images/mantenimiento.png">';
}