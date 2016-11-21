<?php
	session_start();

	if (!isset($_SESSION["validated"]))
  		header('Location: login.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

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
    <div class="container">
    		<div class="row">
    			<h3>Manejador de Tubos</h3>
    		</div>
			<div class="row">
				<p>
					<a href="createTubo.php" class="btn btn-success">Agregar un nuevo tipo de tubo</a>
					<a href="index.php" class="btn btn-primary">Menú principal</a>
				</p>
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>		                 
		                  <th>ID</th>
		                  <th>Diámetro</th>                                              		                
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM tubos';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';							   	
    							   	echo '<td>'. $row['id'] . '</td>';
    							   	echo '<td>'. $row['diametro'] . '</td>';
                                    echo '<td width=250 style="text-align:center;">';
    							   	/**echo '<a class="btn" href="readTubo.php?id='.$row['id'].'">Detalles</a>';
    							   	echo '&nbsp;';
    							   	echo '<a class="btn btn-success" href="updateTubo.php?id='.$row['id'].'">Actualizar</a>';
    							   	echo '&nbsp;';**/
    							   	echo '<a class="btn btn-danger" href="deleteTubo.php?id='.$row['id'].'">Eliminar</a>';
    							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>