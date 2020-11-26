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
	<link rel="stylesheet" type="text/css" href="css/tabla.css">
  <link rel="stylesheet" href="css/detall.css">
<!--===============================================================================================-->
</head>
<body>
  <?php include_once('./assests/menu.php');
       require_once ('conexion/conexion.php');
                      $cedula = $_POST['cedula'];                   
                      $clase = $_POST['clase'];
                      $mes = $_POST['mes'];?>
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

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1">		
					<div class="js-pscroll">
						<div class="table100-nextcols">
							<table>
								<thead>
									<tr class="row100 head">
                    <th class="cell100 column1">Mes</th>
										<th class="cell100 column1">Año</th>
										<th class="cell100 column1">Cuota mes</th>
										<th class="cell100 column1">Abono</th>
										<th class="cell100 column1">Abono total</th>
										<th class="cell100 column1">Cuota por pagar</th>
									</tr>
								</thead>
								<tbody>

									<tr class="row100 body">
                    <?php
                      $sql = "SELECT MES,YEAR,CUOTA_MES,ABONO,ABONO_TOTAL,CUOTA_PAGAR
                              FROM arriendo,inquilinos,clase_propiedad,propiedad,pagos 
                              WHERE arriendo.CEDULA=inquilinos.CEDULA
                              AND clase_propiedad.ID_CLASE=arriendo.ID_CLASE
                              AND clase_propiedad.ID_PROPIEDAD=propiedad.ID_PROPIEDAD
                              AND  pagos.ID_CLASE=clase_propiedad.ID_CLASE
                              AND pagos.CEDULA=inquilinos.CEDULA
                              AND pagos.CEDULA=$cedula
                              AND pagos.ID_CLASE=$clase
                              AND MES='$mes'";                         
											$consulta = mysqli_query($conexion,$sql);
                      while($linea= mysqli_fetch_array($consulta)){
                        echo "<td class='cell100 column1'>".$linea['MES']."</td>";     
                        echo "<td class='cell100 column1'>".$linea['YEAR']."</td>"; 
                        echo "<td class='cell100 column1'>".$linea['CUOTA_MES']."</td>"; 
                        echo "<td class='cell100 column1'>".$linea['ABONO']."</td>";      
                        echo "<td class='cell100 column2'>".$linea['ABONO_TOTAL']."</td>";
                        echo "<td class='cell100 column2'>".$linea['CUOTA_PAGAR']."</td>";
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