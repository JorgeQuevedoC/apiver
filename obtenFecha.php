<?php

	$link = mysql_connect("localhost", "root", "");
	mysql_select_db("apiver", $link);

	$res = mysql_query("select distinct date(fecha) from reportes");

	while($row = mysql_fetch_row($res)):
		$data[] = $row;
	endwhile;

	echo json_encode($data);
	
	mysql_close($link);
?>
