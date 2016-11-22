<?php 
	session_start();

	if (!isset($_SESSION["validated"]))
  		header('Location: login.php');

	include 'database.php';

            $id=array();
            $diametro= array();
            $cantidad= array();
            $fecha= array();
            $proceso = array();
            
            $contadorAprobado=0;
            $contadorActuales=0;
            $contadorPerdidos=0;
            $contadorSi =0;

            $contadorQ=0;
            $contadorP = 0;

            $contadorR=0;
            $contadorS = 0;

            $contadorT=0;
            $contadorU=0;
            
              $pdo = Database::connect();
              $sql = 'SELECT reportes.cantidad, reportes.fecha, reportes.proceso, tubos.diametro, explanadas.nombre FROM reportes INNER JOIN tubos ON reportes.diametro=tubos.diametro INNER JOIN explanadas ON reportes.explanada=explanadas.id ORDER BY reportes.fecha';
              
              foreach ($pdo->query($sql) as $row) {
				$id[$contadorQ]=$row['nombre'];
				$diametro[$contadorQ]=$row['diametro'];
                $cantidad[$contadorQ]=$row['cantidad'];
                $fecha[$contadorQ]=$row['fecha'];
                $proceso[$contadorQ]=$row['proceso'];
                $contadorQ=$contadorQ+1;
                
                	if($row['proceso']=="entrada"){
                		$contadorAprobado =$contadorAprobado + 1;
                	}else{
                		if($row['proceso']=="salida"){
                			$contadorActuales = $contadorActuales +1;
                		}
                	}
              }
                            
              Database::disconnect();
//----------------------------------------------------------------------------------------------------------------

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
	<script type="text/javascript" src="js/script.js"></script>

</head>

<body>
	<header>
		<nav id="header-nav" class="navbar navbar-default"> 
			<div class="container">
				<div class="navbar-header"> 
					<div class="navbar-brand pull-left">
						<a href="index.php"><img src="Img/logo.png" alt="Tenaris Tamsa "></a>
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
	       					<a href="reportes.php">
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
	       					<a href="consulta.php"   class="highlight">
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

		<div class="container">
			<br/><br/>
		</div>
	    
	    <div class="container">
	    
			<div class="span10 offset1">
				<div class="row" style="width: 100%">
					
				</div>

				<input type="text" id="myInput" onkeyup="busqueda()" placeholder="Fecha..." >
				<input type="text" id="myInput2" onkeyup="busqueda()" placeholder="Diámetro..." >
				<input type="text" id="myInput3" onkeyup="busqueda()" placeholder="Proceso..." >
				<div id="contador" style="display: inline;"></div>


			
						<table id="myTable" class="table table-striped" style="width:100%">
						  	<tr class="header" bgcolor="#E6E6FA">
						    	<th style="width:auto;">EXPLANADA</th>
						    	<th style="width:auto;">DIAMETRO</th>
						    	<th style="width:auto;">CANTIDAD</th>
						    	<th style="width:auto;">PROCESO</th>
						    	<th style="width:auto">FECHA</th>
						  	</tr>

						  	<?php 
								foreach ($id as $valor) {
							?>
								<tr>
									<td><?php echo ($id[$contadorP]) ?></td>
									<td><?php echo ($diametro[$contadorP]) ?></td>
									<td><?php echo ($cantidad[$contadorP]) ?></td>
									<td><?php echo ($proceso[$contadorP]) ?></td> 								
									<td><?php echo ($fecha[$contadorP]) ?></td>
								</tr>					  
											
							<?php	
								$contadorP = $contadorP+1;						
								}
							?>
						</table>


			</div>
	    </div> <!-- /container -->
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

	<script src="js/jquery-2.2.4.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>

	</body>
</html>