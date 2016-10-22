<?php

	$link = mysql_connect("localhost", "root", "");
	mysql_select_db("apiver", $link);

	$f1 = $_GET['f1'];
	$f2 = $_GET['f2'];

	$fecha = strtotime("+1 day", strtotime($f2));
	$fecha = date("Y-m-d", $fecha);

	$cadena = "<table style='width:95%'><tr bgcolor='#E6E6FA'><td>Diámetro</td><td>Cantidad</td><td>Fecha</td></tr>";

	$query = mysql_query("SELECT diametro FROM reportes WHERE fecha BETWEEN '" . $f1 . "' AND  '" . $fecha . "'");

	while($row = mysql_fetch_row($query)):
		$data[] = $row;
		$cadena .= "<tr><td>" . $row['diametro'] ."</td><td>" . $row['cantidad'] ."</td><td>" . $row['fecha'] ."</td></tr>";
	endwhile;

	$cadena .= "</table>";

	echo json_encode($cadena);	

?>