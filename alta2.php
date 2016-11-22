<?php 
	require 'database.php';

	$tubosExistentes = array();
	$dummyEntrada = 'entrada';
	$dummysalida = 'salida';
	$cantidadTotal = 0;
	$cuentaTubos = 0;
	$validTubo=false;
	$bandera = 0;
	$bandera2 = 0;

	if ( !empty($_POST)) {	

		// keep track post values
		$cantidad = $_POST['cantidad'];	
		$diametro = $_POST['diametro'];
		$proceso = $_POST['proceso'];	
		$explanada = $_POST['explanada'];	

		
		$pdo = Database::connect();



//Comprobación de existencia del diametro solicitado
		$sqlTubos = 'SELECT * FROM tubos';

	 		foreach ($pdo->query($sqlTubos) as $rowTubos) {
	 			$tubosExistentes[$cuentaTubos] = $rowTubos['diametro'];
	 			$cuentaTubos = $cuentaTubos+1;		 		 
			}

			for ($i=0; $i < $cuentaTubos; $i++) { 
				if ($tubosExistentes[$i] == $diametro) {
	 				$validTubo = true;
	 			}
			}

  
		$sqlEntradas = "SELECT SUM(cantidad) AS suma FROM reportes where diametro = ? AND explanada=? AND proceso='entrada'";
		$qEntradas = $pdo->prepare($sqlEntradas);
		$qEntradas->execute(array($diametro, $explanada));
		$dataEntradas = $qEntradas->fetch(PDO::FETCH_ASSOC);

		//error_log("Entradas:".$dataEntradas['suma']);
		$cantidadTotal = $dataEntradas['suma'];

		$sqlSalidas = "SELECT SUM(cantidad) AS resta FROM reportes where diametro = ? AND explanada=? AND proceso='salida'";
		$qSalidas = $pdo->prepare($sqlSalidas);
		$qSalidas->execute(array($diametro, $explanada));
		$dataSalidas = $qSalidas->fetch(PDO::FETCH_ASSOC);

		//error_log("Salidas:".$dataSalidas['resta']);
		$cantidadTotal = $cantidadTotal - $dataSalidas['resta'];

		//error_log("Cantidad Total: ".$cantidadTotal);

		$sqlMaximo = "SELECT maximo AS tope FROM explanadas where id=?";
		$qMaximo = $pdo->prepare($sqlMaximo);
		$qMaximo->execute(array($explanada));
		$dataMaximo = $qMaximo->fetch(PDO::FETCH_ASSOC);

		error_log("Maximo".$dataMaximo['tope']);

		if ($proceso == 'entrada') {
			$cantidadTotal = $cantidadTotal +$cantidad;
			if ($cantidadTotal > $dataMaximo['tope']) {

				error_log("Te pasaste de el maximo");
				$bandera =1;
			}
		}

		if ($proceso == 'salida') {
			$cantidadTotal = $cantidadTotal  - $cantidad;
			if ($cantidadTotal < 0) {

				error_log("Te estás llevando mas de lo que hay");
				$bandera2 =1;
			}
		}

			
				if ($validTubo) {
					try
					{
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "INSERT INTO reportes (id,cantidad,diametro,proceso,explanada) values(0,?,?,?,?)";				
						$q = $pdo->prepare($sql);
						$q->execute(array($cantidad,$diametro,$proceso,$explanada));
					}
					catch(Exception $e)
					{
							echo $e->getMessage();
					}	
				}else{
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "INSERT INTO tubos (id,diametro) values(null, ?)";			
						$q = $pdo->prepare($sql);
						$q->execute(array($diametro));

					try
					{
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "INSERT INTO reportes (id,cantidad,diametro,proceso,explanada) values(0,?,?,?,?)";				
						$q = $pdo->prepare($sql);
						$q->execute(array($cantidad,$diametro,$proceso,$explanada));
					}
					catch(Exception $e)
					{
							echo $e->getMessage();
					}
				}


			if ($bandera == 1) {
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sqlOverflow = "INSERT INTO overflow (id,explanada) values(0,?)";				
				$qOverflow = $pdo->prepare($sqlOverflow);
				$qOverflow->execute(array($explanada));
			}

			if ($bandera2 == 1) {
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sqlUnderflow = "INSERT INTO underflow (id,explanada) values(0,?)";				
				$qUnderflow = $pdo->prepare($sqlUnderflow);
				$qUnderflow->execute(array($explanada));
			}
				
//Termino el alta de las cosas 	



				
				
			Database::disconnect();
			header("Location: reportes.php");
		

	}else{
			echo "NoPOST";
		}
?>