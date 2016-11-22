<?php
	session_start();

	if (!isset($_SESSION["validated"]))
  		header('Location: login.php');

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

</head>
<body>
	<!--Esta es una prueba de github-->
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
	       					<a href="tubos.php" class="highlight">
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
		                  <th> </th>                                              		                
		                </tr>
		              </thead>
		              <tbody>

		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();

					   $diametrosExistentes = array();
					   $contadorDiametros = 0;

					   $sql2 = 'SELECT * FROM reportes';
					   $sql = 'SELECT * FROM tubos';

					   foreach ($pdo->query($sql2) as $row2){
					   		$diametrosExistentes[$contadorDiametros] = $row2['diametro'];
					   		$contadorDiametros = $contadorDiametros + 1;
					   }

	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';							   	
    							   	echo '<td>'. $row['id'] . '</td>';
    							   	echo '<td>'. $row['diametro'] . '</td>';

	                                echo '<td width=250 style="text-align:center;">';
    							   	if(!in_array($row['diametro'], $diametrosExistentes)){
	    							   	echo '<a class="btn btn-danger" href="deleteTubo.php?id='.$row['id'].'">Eliminar</a>';  	
	    							}
	    							else{
	    							   	echo '<a class="btn btn-danger" disabled="disabled" href="deleteTubo.php?id='.$row['id'].'">Eliminar</a>';
	    							}
	    							echo '</td>';

							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>

				      </tbody>
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
	
  </body>
</html>