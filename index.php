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
	        				<a href="index.php" class="highlight">
	        					<br class="hidden-xs">Inicio</a>
	        			</li>
	        			<li>
	       					<a href="registro.html">
	       						<br class="hidden-xs">Registro</a>
	       				</li>
	       				<li>
	       					<a href="reportes.php">
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

	<div id="main-content" class="container">

		<div class="jumbotron">
	  		<img src="Img/jumbotron.jpg" alt="Tubos" class="img-responsive">
	   	</div>

		<p>TenarisTamsa, el Centro Industrial de Tenaris en México, es uno de los más grandes del mundo en la fabricación de tubos de acero para la industria energética. Ubicado en Veracruz, acompaña desde hace 60 años los retos más exigentes en exploración y producción de petróleo y gas que las compañías líderes enfrentan alrededor del mundo.<p>
		<p>A lo largo de nuestras seis décadas de existencia, hemos contribuido al desarrollo y crecimiento de la industria petrolera mexicana mediante el trabajo conjunto con Pemex en el suministro de productos, tecnología y servicios para los requerimientos más exigentes. Hemos invertido 1,400 millones de dólares en los últimos seis años en: ampliar nuestras operaciones y la oferta de productos, mejorar nuestros procesos y en el cuidado del medio ambiente para satisfacer mejor la demanda de nuestros clientes<p>
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