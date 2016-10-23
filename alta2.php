<?php 
	require 'database.php';


	if ( !empty($_POST)) {	

		// keep track post values
		$cantidad = $_POST['cantidad'];	
		$diametro = $_POST['diametro'];
		$proceso = $_POST['proceso'];	

		
		$pdo = Database::connect();

				try
				{
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "INSERT INTO reportes (id,cantidad,diametro,proceso) values(0,?,?,?)";				
					$q = $pdo->prepare($sql);
					$q->execute(array($cantidad,$diametro,$proceso));

				}
				catch(Exception $e)
				{
					echo $e->getMessage();
				}
				
			Database::disconnect();
			header("Location: registro.html");
		

	}else{
			echo "NoPOST";
		}
?>