<?php 
	//require 'database.php';


	if ( !empty($_POST)) {	


		// keep track post values
		$cantidad = $_POST['RPI'];	

		
		//$pdo = Database::connect();

				try
				{
					/**$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "INSERT INTO reportes (id,cantidad,diametro,proceso,explanada) values(0,?,?,?,?)";				
					$q = $pdo->prepare($sql);
					$q->execute(array($cantidad,$diametro,$proceso,$explanada));**/
					echo "RECIBI: ".$cantidad;

				}
				catch(Exception $e)
				{
					echo $e->getMessage();
				}
				
			//Database::disconnect();
			//header("Location: reportes.php");
		

	}else{
			echo "NoPOSTinfo";
		}
?>