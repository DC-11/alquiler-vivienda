<?php 
     require_once ('conexion/conexion.php');

     $cedul=$_POST['ced'];
     $clase = $_POST['clase'];
     $mes =$_POST['mes'];
     $year=$_POST['year'];
     $abono =$_POST['abono'];
     $abonoTotal =$_POST['abonoTotal'];
     $cuota_mes=$_POST['xmes'];

     $contador=0;
     $abonos=0;
     $ingresodatos = false;
     
     $sql="SELECT MES,YEAR,ABONO,ABONO_TOTAL,CUOTA_PAGAR FROM pagos
          WHERE CEDULA=$cedul
          AND ID_CLASE=$clase
          AND YEAR=$year 
          AND MES='$mes'";
     $consulta = mysqli_query($conexion,$sql);
     if($consulta){
          $number_rows = mysqli_num_rows($consulta);       
          /* cerrar el resulset */
          // mysqli_free_result($consulta);
     }
     printf("numero de fila ".$number_rows);
     if( $number_rows == 0){      
          if($abono <= $cuota_mes && $abonoTotal <= $cuota_mes){ 
               $xpagar = $cuota_mes - $abono - $abonoTotal;    
               $ingresodatos = true;            
          }else{
               $ingresodatos = false;
               echo "<script>
                alert('La cuota mensual ha sido superada verifica los valores');
                window.location= 'consulta.php'
               </script>";
          }        
     }else{
          while($linea= mysqli_fetch_array($consulta)){
               $contador = $contador + $linea['ABONO'] + $linea['ABONO_TOTAL'];
               echo "este es contador".$contador;
               $abonos = $contador + $abono + $abonoTotal;
               echo "este es abono".$abonos;
               if($abonos <= $cuota_mes ){
                    $xpagar = $cuota_mes - $abonos;
                    $ingresodatos = true;
               }else{
                    $ingresodatos = false;
                    echo "<script>
                    alert('La cuota mensual ha sido superada verifica los valores');
                    window.location= 'consulta.php'
                    </script>";
               }
          }
     }
     if($ingresodatos == true){
          $sql="INSERT INTO pagos VALUES (DEFAULT,$cedul,$clase,'$mes',$year,$abono,$abonoTotal,$xpagar,'')";
          $ingreso = mysqli_query($conexion,$sql);
          if($ingreso){
               header("location: consulta.php");
          }else{
               echo '<div align="center"><img src="images/mantenimiento.png"></div>';
         }
     }
    

?>