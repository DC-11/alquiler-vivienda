<?php
	 require_once ('conexion/conexion.php');
  session_start();
 
   
  if(isset($_SESSION['CEDULA_DUE'])){
   header("location: inquilino.php");
 
  }
	if(!empty($_POST))
	{
		$cedula = $_POST['cdl'];
		// echo $cedula;
		$password =$_POST['pass'];
    // echo $password;
		$error = '';
		$sha1_pass = $password;

		$sql = "SELECT CEDULA_DUE,PASSW FROM dueno WHERE CEDULA_DUE=$cedula  AND PASSW='$password'";
		
    $consulta = mysqli_query($conexion,$sql);
    $number_rows = mysqli_num_rows($consulta);       
		if($number_rows > 0) {
			$row = mysqli_fetch_assoc($consulta);
      $_SESSION['CEDULA_DUE'] = $row['CEDULA_DUE'];
      // echo $_SESSION['CEDULA_DUE'];
      $_SESSION['PASSW'] = $row['PASSW'];
    
			header("location: inquilino.php");
			} else {
			$error = "El nombre o contrase&ntilde;a son incorrectos";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="css/iniciarSesion.css">
</head>
<body>
  <div class="contenedor">
    <div class="formulario-banner">
      <div class="banner">
        <img src="images/fondo-imagen.jpg" alt="">
      </div>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <h3>Iniciar Sesión</h3>
        <input type="text" class="numero" name="cdl" id="cdl" maxlength="10" placeholder="Cédula" >
        <input type="password" name="pass" id="pass" placeholder="Contraseña">
        <div class="btn">
          <input type="submit" value="Iniciar sesión"id="boton" disabled>
        </div>
        <div class="contenedor-linea">
          <div class="linea"></div>
          <div class="circulo">o</div>
          <div class="linea"></div>
          <div class="col-md-offset " style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
        </div>
        <div class="enlace">
          <p>¿Olvidaste tu contraseña?</p>
          <a href="">Recuperar</a>
        </div>
        
       </form>
    </div>
    
  </div>
  <footer>
      <p> Copyright ©<script>document.write(new Date().getFullYear());</script></p>
    </footer>
    <script src="js/validar.js"></script>
    <script src="js/eventos.js"></script>
</body>
</html>