<?php

	$link = mysql_connect("localhost", "root", "");
	mysql_select_db("apiver", $link);

	$f1 = $_GET['f1'];
	$f2 = $_GET['f2'];

	$f1 = $f1 . " 00:00:00";
	$f2 = $f2 . " 23:59:59";

	$query = mysql_query("select fecha, diametro, cantidad, proceso from reportes where fecha >= '$f1' and fecha <= '$f2'");
	
	while($row = mysql_fetch_row($query)):
		$data[] = $row;
	endwhile;

	echo json_encode($data);	

	mysql_close($link);
?>