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
  <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
 <?php include_once('./assests/menu.php');?>

  <div class="contenedor-formulario">    
    <div class="formulario">
      <h2>Registrar Arriendo</h2>
      <form action="registrarArriendo.php" method="post" name="formularioarriendo">
  
        <div class="wrap-input100 validate-input" data-validate = "" >
          <select class="ipt" id="" name="inquilino" required>
             <option selected></option>
         <?php                   
          $sql = 'SELECT CEDULA,NOMBRE FROM inquilinos';
          $consulta = mysqli_query($conexion,$sql);
           while($linea= mysqli_fetch_array($consulta)){
              echo '<option value='.$linea['CEDULA'].' >'.$linea['CEDULA'].'-'.$linea['NOMBRE'].'</option>';
           }
          ?>  
          </select>
          <span class="focus-input100" data-placeholder="Nombre"></span>
        </div>
        <!-- ---------------------------------- -->

        <div class="wrap-input100 validate-input" data-validate = "">
           <select class="ipt" id="propiedad" name="propiedad" onchange="mypropiedad()" required>
             <option selected ></option>
          <?php
                  
          $sql = 'SELECT ID_PROPIEDAD,NOMBRE_PROPIEDAD FROM propiedad';
          $consulta = mysqli_query($conexion,$sql);
           while($linea= mysqli_fetch_array($consulta)){
              echo '<option value='.$linea['ID_PROPIEDAD'].' >'.$linea['NOMBRE_PROPIEDAD'].'</option>';
           }
          ?>
          </select>
        <span class="focus-input100" data-placeholder="Nombre propiedad"></span>
        </div>
        <!-- ---------------------------------- -->
        <div class="wrap-input100 validate-input" data-validate = "">
          <select class="ipt" id="sitio" name="sitio" required>
             <option selected ></option>
          
          </select>
        <span class="focus-input100" data-placeholder="Sitio que arrienda"></span>
        </div>
        <!-- ---------------------------------- -->
        <div class="wrap-input100 validate-input" data-validate = "">
          <input type="date" class="ipt has-val" id="fechainicio" name="fechainicio"  min="<?php echo Date('yy-m-d') ?>" required>
          <span class="focus-input100" data-placeholder="Fecha contrato"></span>
        </div>
        <!-- ---------------------------------- -->
        <div class="wrap-input100 validate-input" data-validate = "">
          <input type="text" class="ipt numero" id="numeroMeses" name="numeroMeses" maxlength="3" required>
          <span class="focus-input100" data-placeholder="Número de meses"></span>
        </div>
       
        <!-- ---------------------------------- -->
        <div class="wrap-input100 validate-input" data-validate = "">
          <input type="text" class="ipt numero" id="" name="garantia" maxlength="8" required>
          <span class="focus-input100" data-placeholder="Valor de garantía"></span>
        </div>
        <!-- ---------------------------------- -->
        <div class="wrap-input100 validate-input" data-validate = "">
          <input type="text" class="ipt numero" id="" name="xmes" maxlength="7" required>
          <span class="focus-input100" data-placeholder="Cuota mensual"></span>
        </div>
        <!-- ---------------------------------- -->
        
        <div class="btn">
          <input type="submit" value="Registrar">
        </div>
      </form>
    </div>
  </div>
  <script src="js/eventos.js"></script>
  <script>
      var sitio1 = [
      [1,'Departamento 1'],
      [2,'Departamento 2']
    ];
    var sitio2 = [
      [3,'Casa 1'],
      [4,'Casa 2']
    ];
    var sitio3 = [
      [5,'Vivienda 1'],
      [6,'Vivienda 2']
    ];
    var sitio4 = [
      [7,'Suit 1'],
      [8,'Suit 2']
    ];
    var sitio5 = [
      [9,'Flat 1'],
      [10,'Flat 2']
    ];
    var sitios = ["-",sitio1,sitio2,sitio3,sitio4,sitio5];
    function mypropiedad(){
      let propiedad = document.getElementById("propiedad");
      let sitio = document.getElementById("sitio");
      let selecPropiedad = propiedad.options[propiedad.selectedIndex].value;
      if(selecPropiedad != 0){
        let mipropiedad = sitios[selecPropiedad];
        let num_sitios = mipropiedad.length;
        sitio.length = num_sitios;
        for (let i = 0; i < mipropiedad.length; i++) {
           sitio.options[i].value = mipropiedad[i][0];       
           sitio.options[i].text = mipropiedad[i][1];              
      }
    }
      }
      
  </script>
  
</body>
</html>