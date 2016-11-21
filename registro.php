<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tenaris Tamsa</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.css">

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
	        				<a href="index.php" class="highlight">
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

	<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
		<div class="row">
			<form class="form-inline" action="alta2.php" method="post">

			  <div class="form-group">
			    <label for="cantidad">Cantidad</label>
			    <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="15">
			  </div>
			
			  <div class="form-group">
			    <label for="diametro">Diámetro (cm)</label>
			    <select class="form-control"  name ="diametro" id="diametro">
                        <?php
                        	require 'database.php';
							$pdo = Database::connect();
					   		$query = 'SELECT * FROM tubos';
	 				   		foreach ($pdo->query($query) as $row) {
       	   						echo "<option value='" . $row['id'] . "'>" . $row['diametro'] . "</option>";
					   		}
					   		Database::disconnect();
						?>                                
                </select>
			  </div>

			  <div class="form-group">
			    <label for="explanada">Explanada</label>
			    <select class="form-control"  name ="explanada" id="explanada">
                        <?php                     
							$pdo2 = Database::connect();
					   		$query2 = 'SELECT * FROM explanadas';
	 				   		foreach ($pdo2->query($query2) as $row2) {
       	   						echo "<option value='" . $row2['id'] . "'>" . $row2['nombre'] . "</option>";
					   		}
					   		Database::disconnect();
						?>                                
                </select>
			  </div>

			  <div class="form-group">
			    <label for="proceso">Proceso</label>
			    <select class="form-control" id="proceso" name="proceso">
			    	<option value="entrada">Entrada</option>
			    	<option value="salida">Salida</option>
			    </select>
			  </div>
			
			  <button type="submit" class="btn btn-primary">Agregar</button>
			
			</form>
		</div>
	</div>


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

	<script src="js/jquery-2.2.4.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
  	<script src="js/script.js"</script>
</body>
</html>