<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <title>Document</title>
  <link rel="stylesheet" href="css/detall.css">
  <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/tabla.css">
</head>
<body>
  <?php
       include_once('./assests/menu.php');
        require_once ('conexion/conexion.php');
        $cedula=$_REQUEST['CEDULA'];
        $clase=$_REQUEST['ID_CLASE'];
  ?>
  
    <?php include_once('./assests/encabezadobusqueda.php');?>
      <form action="buscar.php" method="post">
        <div class="buscar"> 
          <input type="text" name="mes" id="mes" placeholder="MES">
          <input type="hidden" name="cedula" id="cedula" value="<?php echo $cedula?>">
          <input type="hidden" name="clase" id="clase" value="<?php echo $clase?>">
          <button>Buscar</button>
        </div>
      </form>
    </div>
  </div>
      <?php require_once ('tabla-pagos.php');?>
</body>
</html>