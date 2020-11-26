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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php include_once('./assests/menu.php');
        $cedula=$_REQUEST['CEDULA']; 
        $couta_mes=$_REQUEST['CUOTA_MES'];
        $clase=$_REQUEST['ID_CLASE'];
        ?>

  <div class="contenedor-formulario">    
    <div class="formulario">
      <h2>Registrar Pago</h2>
      <form action="registrarPago.php" method="post">
          <input type="hidden" class="ipt" id="ced" name="ced" value="<?php echo $cedula?>">
          <input type="hidden" class="ipt" id="clase" name="clase" value="<?php echo $clase?>">
        <!-- ---------------------------------- -->
        <div class="wrap-input100 validate-input" data-validate = "">
          <select name="mes" id="mes" class="ipt" required>
            <option></option>
            <option value="Enero">Enero</option>
            <option value="Febrero">Febrero</option>
            <option value="Marzo">Marzo</option>
            <option value="Abril">Abril</option>
            <option value="Mayo">Mayo</option>
            <option value="Junio">Junio</option>
            <option value="Julio">Julio</option>
            <option value="Agosto">Agosto</option>
            <option value="Septiembre">Septiembre</option>
            <option value="Octubre">Octubre</option>
            <option value="Noviembre">Noviembre</option>
            <option value="Diciembre">Diciembre</option>
          </select>
            <span class="focus-input100" data-placeholder="Mes"></span>
        </div>
        <!-- ---------------------------------- -->
        <div class="wrap-input100 validate-input" data-validate = "">
          <select name="year" id="year" class="ipt" required>
            <option value=""></option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
          </select>
            <span class="focus-input100" data-placeholder="Año"></span>
        </div>
        <!-- ---------------------------------- -->
        <div class="wrap-input100 validate-input" data-validate = "">
  
            <input type="text" class="ipt numero" id="abono" name="abono" maxlength="8" required>
            <span class="focus-input100" data-placeholder="Abono"></span>
        </div>
        <!-- ---------------------------------- -->
        <div class="wrap-input100 validate-input" data-validate = "">
            <input type="text" class="ipt numero" id="abonoTotal" name="abonoTotal" maxlength="8" required>
            <span class="focus-input100" data-placeholder="Abono Total"></span>
        </div>
        <!-- ---------------------------------- -->
        
            <input type="hidden" class="" id="xmes" name="xmes" value="<?php echo $couta_mes?>">
            

         <!-- ---------------------------------- --> 
        
         <!-- ---------------------------------- --> 
         
        <div class="btn">
          <input type="submit" value="Pagar">
        </div>
      </form>
    </div>
  </div>
  <script src="js/eventos.js"></script>
</body>
</html>