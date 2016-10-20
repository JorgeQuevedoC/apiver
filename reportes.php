<?php 
	include 'database.php';


            $diametro=array();
            $cantidad= array();
            $fecha= array();
            $contadorQ = 0;
            $contadorP=0;

            
              $pdo = Database::connect();
              $sql = 'SELECT * FROM reportes';
              
              foreach ($pdo->query($sql) as $row) {
		  		$diametro[$contadorQ]=$row['diametro'];
                $cantidad[$contadorQ]=$row['cantidad'];
                $fecha[$contadorQ]=$row['fecha'];     

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
						<a href="index.html"><img src="Img/logo.png" alt="Tenaris Tamsa "></a>
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
	        				<a href="index.html">
	        					<br class="hidden-xs">Inicio</a>
	        			</li>
	        			<li>
	       					<a href="registro.html">
	       						<br class="hidden-xs">Registro</a>
	       				</li>
	       				<li>
	       					<a href="reportes.php" class="highlight">
	       						<br class="hidden-xs">Reportes</a>
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
								  </tr>
					<?php 
						foreach ($diametro as $valor) {
					?>
								  <tr>
								    <td><?php echo ($diametro[$contadorP]) ?></td>
								    <td><?php echo ($cantidad[$contadorP]) ?></td>
								    <td><?php echo ($fecha[$contadorP]) ?></td>							   
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
				     	<option>Fecha</option>
				    </select>
			</fieldset>

			<div id="bHolder">		
				<input type="button" id="submit" value="Genera Formato"/>
			</div>

			<div class="form-group" style="display: none" id="diam">
			    <label for="diametro">Diámetro (cm)</label>
			    <input type="text" class="form-control" id="diametroin" name="diametroin">
			</div>

			<div id="bHolderDiam" style="display: none">
				<input type='button' id='submitDiam' value='Buscar Número de Tubos'/>
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
	</body>
</html>