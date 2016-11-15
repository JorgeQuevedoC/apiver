<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$f_idError = null;
		$submError = null;
		$marcError = null;

		
		// keep track post values		
		$subm = $_POST['subm'];
		$marc = $_POST['marc'];


		//collect current values 
		$pdo = Database::connect();
		$sql = 'SELECT * FROM explanadas';
	 	foreach ($pdo->query($sql) as $row) {
			if ($row['nombre'] == $subm) {
				$subm = null;
			}
		}
		Database::disconnect();
		
		
		// validate input
		$valid = true;
		// if (empty($f_id)) {
		// 	$f_idError = 'Porfavor escribe un id';
		// 	$valid = false;
		// }
		if (empty($subm)) {
			$submError = 'Porfavor escribe un nombre válido e inexistente';
			$valid = false;
		}
		if (empty($marc)) {
			$marcError = 'Porfavor escribe una cantidad máxima de tubos';
			$valid = false;
		}
				
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//$sql = "INSERT INTO customers (name,email,mobile) values(?, ?, ?)";
			$sql = "INSERT INTO explanadas (id,nombre,maximo) values(null, ?, ?)";			
			$q = $pdo->prepare($sql);
			$q->execute(array($subm,$marc));
			
			Database::disconnect();
			header("Location: explanadas.php");
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Agregar una nueva explanada</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="create.php" method="post">

					  <div class="control-group <?php echo !empty($submError)?'error':'';?>">
					    <label class="control-label">Nombre</label>
					    <div class="controls">
					      	<input name="subm" type="text"  placeholder="Explanada1" value="<?php echo !empty($subm)?$subm:'';?>">
					      	<?php if (!empty($submError)): ?>
					      		<span class="help-inline"><?php echo $submError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>

					  <!--  -->


						<div class="control-group <?php echo !empty($marcError)?'error':'';?>">
					    	<label class="control-label">Maximo</label>
					    	<div class="controls">
					    		<input name="marc" type="text"  placeholder="500" value="<?php echo !empty($marc)?$marc:'';?>">
						      	<?php if (!empty($marcError)): ?>
						      		<span class="help-inline"><?php echo $marcError;?></span>
						      	<?php endif; ?>
					    	</div>
					  	</div>


					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Agregar</button>
						  <a class="btn" href="explanadas.php">Regresar</a>
						</div>

					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>