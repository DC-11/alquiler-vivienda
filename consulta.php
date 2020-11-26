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
	<title>Consulta</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="css/util.css"> -->
	<link rel="stylesheet" type="text/css" href="css/tabla.css">
<!--===============================================================================================-->
</head>
<body>
	<?php include_once('./assests/menu.php');
  require_once ('conexion/conexion.php');?>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1">		
					<div class="js-pscroll">
						<div class="table100-nextcols">
							<table>
								<thead>
									<tr class="row100 head">
                    <th class="cell100 column2">Cédula</th>
										<th class="cell100 column2">Nombre</th>
										<th class="cell100 column3">Propiedad</th>
										<th class="cell100 column4">Sitio</th>
										<th class="cell100 column5">Fecha contrato</th>
										<th class="cell100 column6">Duración contrato</th>
										<th class="cell100 column7">Valor garantía</th>
										<th class="cell100 column8">Cuota mes</th>
										<th class="cell100 column8">Total a pagar</th>
										<th class="cell100 column9" colspan="2">Acción</th>
									</tr>
								</thead>
								<tbody>

									<tr class="row100 body">
                    <?php                   
                      $sql = 'SELECT inquilinos.CEDULA, NOMBRE, NOMBRE_PROPIEDAD, NOMBRE_CLASE, FEHCACONTRATO, DURACIONCONTRATO, VALOR_GARANTIA, CUOTA_MES, TOTAL_PAGO,clase_propiedad.ID_CLASE
                      FROM arriendo,inquilinos, clase_propiedad,propiedad
                      WHERE arriendo.CEDULA = inquilinos.CEDULA
                      AND arriendo.ID_CLASE = clase_propiedad.ID_CLASE    
                      AND propiedad.ID_PROPIEDAD = clase_propiedad.ID_PROPIEDAD';
                      $consulta = mysqli_query($conexion,$sql);
                      while($linea= mysqli_fetch_array($consulta)){
                        echo "<td class='cell100 column2'>".$linea['CEDULA']."</td>";     
                        echo "<td class='cell100 column3'>".$linea['NOMBRE']."</td>"; 
                        echo "<td class='cell100 column4'>".$linea['NOMBRE_PROPIEDAD']."</td>";      
                        echo "<td class='cell100 column5'>".$linea['NOMBRE_CLASE']."</td>";
                        echo "<td class='cell100 column6'>".$linea['FEHCACONTRATO']."</td>";
                        echo "<td class='cell100 column7'>".$linea['DURACIONCONTRATO']."</td>";
                        echo "<td class='cell100 column8'>".$linea['VALOR_GARANTIA']."</td>";
                        echo "<td class='cell100 column9'>".$linea['CUOTA_MES']."</td>";
                        echo "<td class='cell100 column10'>".$linea['TOTAL_PAGO']."</td>";
												echo "<td><a class='enlace' href='pago.php?CEDULA=".$linea['CEDULA']."&CUOTA_MES=".$linea['CUOTA_MES']."&ID_CLASE=".$linea['ID_CLASE']." '>Pagar</a></td>";
            						echo "<td><a class='enlace' href='detalle.php?CEDULA=".$linea['CEDULA']."&ID_CLASE=".$linea['ID_CLASE']."'>Detalle</a></td>";
                        echo "</tr>";

                      }?>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})

			$(this).on('ps-x-reach-start', function(){
				$(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
			});

			$(this).on('ps-scroll-x', function(){
				$(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
			});

		});

		
		
		
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>