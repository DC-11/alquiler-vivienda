<?php
	 require_once ('conexion/conexion.php');
  session_start();
 
   
  if(!isset($_SESSION['CEDULA_DUE'])){
   header("location: index.php");
 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
 <?php include_once('./assests/menu.php'); ?>

  <div class="contenedor-formulario">    
    <div class="formulario">
      <h2>Registrar Inquilino</h2>
      <form action="registrarInquilino.php" method="post" name="formularioInquilino">
        <div class="wrap-input100 validate-input" data-validate = "">
          <input type="text" class="ipt numero" id="" name="cedula" maxlength="10" required>
          <span class="focus-input100" data-placeholder="Cédula"></span>
        </div>
        <!-- ---------------------------------- -->
        <div class="wrap-input100 validate-input" data-validate = "">
          <input type="text" class="ipt texto" id="nombre" name="nombre" minlength="2" maxlength="50" pattern="[a-zA-Z]+\s[a-zA-Z]+\s([a-zA-Z]+?)\s([a-zA-Z]+?)"  required>
          <span class="focus-input100" data-placeholder="Nombre"></span>
        </div>
        <!-- ---------------------------------- -->
        <div class="wrap-input100 validate-input" data-validate = "">
          <input type="text" class="ipt numero" id="" name="tconvencional" maxlength="9" required>
          <span class="focus-input100" data-placeholder="Teléfono convencional"></span>
        </div>
        <!-- ---------------------------------- -->
        <div class="wrap-input100 validate-input" data-validate = "">
          <input type="text" class="ipt numero" id="" name="celular"  maxlength="10" required>
          <span class="focus-input100" data-placeholder="Celular"></span>
        </div>
       <!-- ---------------------------------- -->
        <div class="wrap-input100 validate-input" data-validate = "">
          <input type="text" class="ipt texto" id="personac" name="personac" minlength="2" maxlength="50" pattern="[a-zA-Z]+\s[a-zA-Z]+(\s?)([a-zA-Z]+?)(\s?)([a-zA-Z]+?)" required>
          <span class="focus-input100" data-placeholder="Persona contacto"></span>
        </div>
        <!-- ---------------------------------- -->
        <div class="wrap-input100 validate-input" data-validate = "">
          <input type="text" class="ipt numero" id="" name="tpersona" maxlength="10" required>
          <span class="focus-input100" data-placeholder="Teléfono persona de contacto"></span>
        </div>
        <!-- ---------------------------------- -->
        
        <div class="btn">
          <input type="submit" value="Registrar">
        </div>
      </form>
    </div>
  </div>
  <script src="js/eventos.js"></script>
  </script>
</body>
</html>