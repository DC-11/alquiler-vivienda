<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  	<?require_once ('conexion/conexion.php');?>
  <div class="container-inquilino"> 
    <div class="inquilinos">
    <?php
     $sql ='SELECT inquilinos.CEDULA, NOMBRE, TELEFONO, CELULAR, PERSONA_CONTACTO, TELEFONO_CONTACTO, NOMBRE_PROPIEDAD, NOMBRE_CLASE
            FROM arriendo,inquilinos,clase_propiedad,propiedad WHERE arriendo.CEDULA=inquilinos.CEDULA
            AND clase_propiedad.ID_CLASE=arriendo.ID_CLASE
            AND clase_propiedad.ID_PROPIEDAD=propiedad.ID_PROPIEDAD
            AND inquilinos.CEDULA ='.$cedula.' 
            AND clase_propiedad.ID_CLASE ='.$clase;
        $consulta = mysqli_query($conexion,$sql);
        while($linea= mysqli_fetch_array($consulta)){
          echo '<label class="dato">Cédula: '.$linea['CEDULA'].'</label>';
          echo '<label class="dato">Nombre: '.$linea['NOMBRE'].'</label>';
          echo '<label class="dato">Teléfono: '.$linea['TELEFONO'].'</label>';
          echo '<label class="dato">Celular: '.$linea['CELULAR'].'</label>';
          echo '<label class="dato">Persona contacto: '.$linea['PERSONA_CONTACTO'].'</label>';
          echo '<label class="dato">Nombre propiedad: '.$linea['NOMBRE_PROPIEDAD'].'</label>';
          echo '<label class="dato">Sitio: '.$linea['NOMBRE_CLASE'].'</label>';
        }
    ?>
   
</body>
</html>