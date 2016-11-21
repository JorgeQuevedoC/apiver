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
            $contadorQ = 0;
            $contadorP=0;

            
              $pdo = Database::connect();
              $sql = 'SELECT reportes.cantidad, reportes.fecha, reportes.proceso, tubos.diametro, explanadas.nombre FROM reportes INNER JOIN tubos ON reportes.diametro=tubos.id INNER JOIN explanadas ON reportes.explanada=explanadas.id ORDER BY reportes.fecha';
              
              foreach ($pdo->query($sql) as $row) {
		  		$diametro[$contadorQ]=$row['diametro'];
                $cantidad[$contadorQ]=$row['cantidad'];
                $fecha[$contadorQ]=$row['fecha'];     
                $proceso[$contadorQ]=$row['proceso'];
                $explanada[$contadorQ]=$row['nombre']; 

                $contadorQ=$contadorQ+1;
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
			<table style="width:95%">
								  <tr bgcolor="#E6E6FA">
								    <td>Diámetro</td>
								    <td>Cantidad</td>
								    <td>Fecha</td>
								    <td>Proceso</td>
								    <td>Explanada</td>
								  </tr>
					<?php 
						foreach ($diametro as $valor) {
					?>
								  <tr>
								    <td><?php echo ($diametro[$contadorP]) ?></td>
								    <td><?php echo ($cantidad[$contadorP]) ?></td>
								    <td><?php echo ($fecha[$contadorP]) ?></td>		
								    <td><?php echo ($proceso[$contadorP]) ?></td>
								    <td><?php echo ($explanada[$contadorP]) ?></td>							   
								  </tr>		
								  
								
					<?php	
						$contadorP = $contadorP+1;						
						}
					?>
			</table> 
			<fieldset>
    			<label for="Evento">Selecciona el tipo de búsqueda: </label>
				    <select name="evento" id="evento">
				     	<option>Diámetro</option>
				     	<option>Cantidad de Tubos</option>
				     	<option>Fecha</option>
				     	<option>Explanada</option>
				    </select>
			</fieldset>

			<div id="bHolder">		
				<input type="button" id="submit" value="Iniciar Búsqueda"/>
			</div>

			<fieldset id="diam" style="display: none">
				<script type='text/javascript'>
					getDiametro();
				</script>
    			<label for="Evento">Selecciona el Tamaño (en cm.)</label>
			    <select name="diametro" id="diametro">

			    </select>
			</fieldset>

			<div id="bHolderDiam" style="display: none">
				<input type='button' id='submitDiam' value='Buscar Número de Tubos'/>
			</div>

			<div class="form-group" style="display: none; text-align: center;" id="fecha">
			    
			    <fieldset id="diam" style="display: inline !important;">
					<script type='text/javascript'>
						getFecha();
					</script>
	    			<label for="Evento">De: </label>
				    <select name="f1" id="f1">

				    </select>
				</fieldset>

			    <fieldset id="diam" style="display: inline !important;">
	    			<label for="Evento">Hasta: </label>
				    <select name="f2" id="f2">

				    </select>
				</fieldset>

			</div>

			<div id="bHolderFecha" style="display: none">
				<input type='button' id='submitFecha' value='Buscar por Fecha'/>
			</div>

			<div id="tabla"></div>

		</div>
	</section>

	<footer class="pannel-footer">
		<div class="container" id="bottom">
		        <section id="datos" class="text-center">
		          	<span>Copyright &copy; 2016 Tenaris Tamsa</span>
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

	<script>
  		$('#submit').click(function(){
			HazQuery();
		});
	</script>
	<script>
		$('#submitDiam').click(function(){
			BuscaDiametro();
		})
	</script>
	<script>
		$('#submitFecha').click(function(){
			BuscaFecha();
		})
	</script>
	</body>
</html>