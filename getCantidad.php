<?php

	$link = mysql_connect("localhost", "root", "");
	mysql_select_db("apiver", $link);

	$val = 0;

	$res = mysql_query("SELECT cantidad, proceso FROM reportes");
	while($row = mysql_fetch_array($res)){
		if($row['proceso'] === "entrada")
			$val += $row['cantidad'];
		else
			$val -= $row['cantidad'];
	}

	$string = "<p>Número de Tubos en existencia: " . $val . "</p>";

	echo json_encode($string);	

?>