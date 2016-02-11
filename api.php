<?php
	header("Content-type: application/json");
	
	// koneksi
	$mysqli = new mysqli("localhost", "root", "root", "transiti");
	$rst = $mysqli->query("SELECT * FROM angkot");
	
	$arr = array();
	while($row = $rst->fetch_array()) {
		array_push($arr, array(
			'id' => $row[0],
			'name' => $row[1],
			'desc' => $row[2],
			'price' => $row[3]
		));
	}
	
	echo json_encode($arr);