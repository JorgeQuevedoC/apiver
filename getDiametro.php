<?php

	$link = mysql_connect("localhost", "root", "");
	mysql_select_db("apiver", $link);

	$diam = $_GET['diam'];

	$val = 0;

	$res = mysql_query("SELECT cantidad, proceso FROM reportes WHERE diametro = '$diam'");
	while($row = mysql_fetch_array($res)){
		if($row['proceso'] === "entrada")
			$val += $row['cantidad'];
		else
			$val -= $row['cantidad'];
	}

	$string = "<p>Número de tubos con diámetro de ". $diam . "(cm): " . $val . "</p>";

	echo json_encode($string);	

?>