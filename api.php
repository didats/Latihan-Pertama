<?php
	header("Content-type: application/json");
	
	$arr = array(
		'data' => array(
			array('name' => "Panasonic"),
			array('name' => "Samsung"),
		)
	);
	
	echo json_encode($arr);