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
	       					<a href="registro.php" class="highlight">
	       						<br class="hidden-xs">Registro</a>
	       				</li>
	       				<li>
	       					<a href="reportes.html">
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

	<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
		<div class="row">
			<form class="form-inline" action="alta2.php" method="post">

			  <div class="form-group">
			    <label for="cantidad">Cantidad</label>
			    <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="15">
			  </div>
			
			  <div class="form-group">
			    <label for="diametro">Diámetro (cm)</label>
			    <input type="text" class="form-control" id="diametro" name="diametro" placeholder="40">
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