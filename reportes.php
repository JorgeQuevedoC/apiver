<?php 
	session_start();

	include 'database.php';

	if (!isset($_SESSION["validated"]))
  		header('Location: login.php');

            $diametro=array();
            $cantidad= array();
            $fecha= array();
            $proceso= array();
            $explanada =array();

            $overflow = array();
            $underflow = array();
            $fechaOverflow = array();
            $fechaUderflow = array();
            $contadorO=0;
            $contadorO2=0;

            $contadorU=0;
            $contadorU2=0;


            $contadorQ = 0;
            $contadorP=0;
            $bandera = 0;

            
              $pdo = Database::connect();
              $sql = 'SELECT reportes.cantidad, reportes.fecha, reportes.proceso, tubos.diametro, explanadas.nombre FROM reportes INNER JOIN tubos ON reportes.diametro=tubos.diametro INNER JOIN explanadas ON reportes.explanada=explanadas.id ORDER BY reportes.fecha';
              
              foreach ($pdo->query($sql) as $row) {
              	if(in_array($row['nombre'], $explanada) && in_array($row['diametro'], $diametro) && $contadorQ != 0){
              		for($i = 0; $i < $contadorQ; $i=$i+1){
              			if($diametro[$i] === $row['diametro'] && $explanada[$i] === $row['nombre']){
              				if($row['proceso'] === 'entrada'){
              					$cantidad[$i] = $cantidad[$i] + $row['cantidad'];
              				}
              				else{
              					$cantidad[$i] = $cantidad[$i] - $row['cantidad'];
              				}
              				$bandera = 1;
              				break;
              			}
              		}
              		if($bandera != 1){
              			$diametro[$contadorQ]=$row['diametro'];
			            $cantidad[$contadorQ]=$row['cantidad'];
			            $fecha[$contadorQ]=$row['fecha'];     
			            $proceso[$contadorQ]=$row['proceso'];
			            $explanada[$contadorQ]=$row['nombre']; 
						$contadorQ=$contadorQ+1;
              		}
              	}
              	else{
              		$diametro[$contadorQ]=$row['diametro'];
		            $cantidad[$contadorQ]=$row['cantidad'];
		            $fecha[$contadorQ]=$row['fecha'];     
		            $proceso[$contadorQ]=$row['proceso'];
		            $explanada[$contadorQ]=$row['nombre']; 
					$contadorQ=$contadorQ+1;
              	}
            }

            $sqlOverflow = 'SELECT overflow.fecha, explanadas.nombre FROM overflow INNER JOIN explanadas ON overflow.explanada=explanadas.id ORDER BY overflow.fecha';
              
            foreach ($pdo->query($sqlOverflow) as $row) {
            	$overflow[$contadorO]=$row['nombre'];
		        $fechaOverflow[$contadorO]=$row['fecha'];     
				$contadorO=$contadorO+1;    	
            }

            $sqlUnderflow = 'SELECT underflow.fecha, explanadas.nombre FROM underflow INNER JOIN explanadas ON underflow.explanada=explanadas.id ORDER BY underflow.fecha';
              
            foreach ($pdo->query($sqlUnderflow) as $row) {
            	$underflow[$contadorU]=$row['nombre'];
		        $fechaUderflow[$contadorU]=$row['fecha'];     
				$contadorU=$contadorU+1;    	
            }



              Database::disconnect();
//--------------------____------------------------------------------------------------------------------------

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tenaris Tamsa</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.css">

	<script src="js/jquery-2.2.4.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>

</head>
<body>
	<header>
		<nav id="header-nav" class="navbar navbar-default"> 
			<div class="container">
				<div class="navbar-header"> 
					<div class="navbar-brand pull-left">
						<a href="index.php"><img src="Img/logo.png" alt="Tenaris Tamsa "></a>
						<a href="index.php"><img src="Img/apiverLogo.png" alt="Apiver"></a>
					</div> 
					<div class="navbar-brand pull-left">
						
					</div> 


					
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
	        			<span class="sr-only">Toggle navigation</span>
	        			<span class="icon-bar"></span>
	        			<span class="icon-bar"></span>
	        			<span class="icon-bar"></span>
	      			</button> 
	      		</div> 

	      		<div id="collapsable-nav" class="collapse navbar-collapse"> 
	      			<ul id="nav-list" class="text-center nav navbar-nav navbar-right">
	        			<li>
	        				<a href="index.php">
	        					<br class="hidden-xs">Inicio</a>
	        			</li>
	        			<li>
	       					<a href="registro.php">
	       						<br class="hidden-xs">Registro</a>
	       				</li>
	       				<li>
	       					<a href="reportes.php" class="highlight">
	       						<br class="hidden-xs">Reportes</a>
	       				</li>
	       				<li>
	       					<a href="tubos.php">
	       						<br class="hidden-xs">Tubos</a>
	       				</li>
	       				<li>
	       					<a href="explanadas.php">
	       						<br class="hidden-xs">Explanadas</a>
	       				</li>
	       				<li>
	       					<a href="consulta.php">
	       						<br class="hidden-xs">Consulta</a>
	       				</li>
	   				</ul>
	   			</div> 
				
			</div>
		</nav>

	</header>

	<div class="container" id="top">
		<div class="row">
		    <section class="blue col-xs-4">
		        <hr class="bl">
		    </section>
		    <section class="green col-xs-4">
			    <hr class="gr">
		    </section>
		    <section class="purple col-xs-4">
		        <hr class="pr">
		    </section>
		</div>
	</div>

	<section id="main-content">
		<div class="container">
			<h1>Existencia</h1>
			<table style="width:95%" class="table table-striped">
								  <tr bgcolor="#E6E6FA">
								    <th>Diámetro</th>
								    <th>Cantidad</th>
								    <th>Explanada</th>
								  </tr>
					<?php 
						foreach ($diametro as $valor) {
					?>
								  <tr>
								    <td><?php echo ($diametro[$contadorP]) ?></td>
								    <td><?php echo ($cantidad[$contadorP]) ?></td>
								    <td><?php echo ($explanada[$contadorP]) ?></td>							   
								  </tr>		
								  
								
					<?php	
						$contadorP = $contadorP+1;						
						}
					?>
			</table> 


			<div id="tabla"></div>

		</div>

		<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3>Excedentes</h3>
				<table style="width:95%" class="table table-striped">
					<tr bgcolor="#E6E6FA">
						<th>Explanada</th>
						<th>Fecha</th>
					</tr>
					<?php 
						foreach ($overflow as $valor) {
					?>
								  <tr>
								    <td><?php echo ($overflow[$contadorO2]) ?></td>
								    <td><?php echo ($fechaOverflow[$contadorO2]) ?></td>						   
								  </tr>		
								  
								
					<?php	
						$contadorO2 = $contadorO2+1;						
						}
					?>
				</table> 
			</div>
	  		<div class="col-md-6">
	  			<h3>Decrecientes</h3>
	  			<table style="width:95%" class="table table-striped">
					<tr bgcolor="#E6E6FA">
						<th>Explanada</th>
						<th>Fecha</th>
					</tr>
					<?php 
						foreach ($underflow as $valor) {
					?>
								  <tr>
								    <td><?php echo ($underflow[$contadorU2]) ?></td>
								    <td><?php echo ($fechaUderflow[$contadorU2]) ?></td>						   
								  </tr>		
								  
								
					<?php	
						$contadorU2 = $contadorU2+1;						
						}
					?>
				</table>
	  		</div>
		</div>
		</div>

	</section>

	<footer class="pannel-footer">
		<div class="container" id="bottom">
		        <section id="datos" class="text-center">
		          	<span>Copyright &copy; 2016 Tenaris Tamsa & APIVER</span>
		        </section>
		    <div class="row">
		        <section class="blue col-xs-4">
			        <hr class="bl">
			    </section>
			    <section class="green col-xs-4">
			        <hr class="gr">
			    </section>
			    <section class="purple col-xs-4">
			        <hr class="pr">
			    </section>
		    </div>
	    </div>
	</footer>

	</body>
</html>