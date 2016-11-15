<?php 
	session_start();

	if (!isset($_SESSION["validated"]))
  		header('Location: login.php');

	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$f_idError = null;
		$submError = null;
		$marcError = null;
		$acError = null;

		
		// keep track post values		
		//$f_id = $_POST['f_id'];
		$subm = $_POST['subm'];


		//collect current values 
		$pdo = Database::connect();
		$sql = 'SELECT * FROM tubos';
	 	foreach ($pdo->query($sql) as $row) {
			if ($row['diametro'] == $subm) {
				$subm = null;
			}
		}
		Database::disconnect();


		
		
		// validate input
		$valid = true;
		if (empty($subm)) {
			$submError = 'Porfavor escribe un diametro';
			$valid = false;
		}
				
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//$sql = "INSERT INTO customers (name,email,mobile) values(?, ?, ?)";
			$sql = "INSERT INTO tubos (id,diametro) values(null, ?)";			
			$q = $pdo->prepare($sql);
			$q->execute(array($subm));
			
			Database::disconnect();
			header("Location: tubos.php");
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
		    			<h3>Agregar un tubo nuevo</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="createTubo.php" method="post">


					  <div class="control-group <?php echo !empty($submError)?'error':'';?>">
					    <label class="control-label">Diametro (cm)</label>
					    <div class="controls">
					      	<input name="subm" type="text"  placeholder="40" value="<?php echo !empty($subm)?$subm:'';?>">
					      	<?php if (!empty($submError)): ?>
					      		<span class="help-inline"><?php echo $submError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>



					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Agregar</button>
						  <a class="btn" href="tubos.php">Regresar</a>
						</div>

					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>