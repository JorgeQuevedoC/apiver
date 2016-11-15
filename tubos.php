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
</head>

<body>
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