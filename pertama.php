<?php
	error_reporting(E_ALL); 
	ini_set('display_errors', 1);
	
	// koneksi ke database
	$mysqli = new mysqli("localhost", "root", "root", "transiti");
	
	$arrFile = array("ADL.txt", "AG.txt", "GA.txt");
	
	function bacaFile($namafile) {
		
		global $dir, $mysqli;
		
		$file = fopen(getcwd()."/".$namafile, "r");
		$baris = fgets($file);
		
		while(($baris = fgets($file)) ==! FALSE) {
			
			$data = explode(",", $baris);
			
			if (count($data) > 3) {
				$strAngkot = $data[0];
				
				$strSQL = "SELECT * FROM angkot WHERE angkot_name = '$strAngkot'";
				$rst = $mysqli->query($strSQL);
				$rows = $rst->fetch_array();
				
				if (count($rows) == 0) {
					
					$strSQL = "INSERT INTO angkot SET angkot_name = '$strAngkot', angkot_desc = '$strAngkot', angkot_price = '4000'";
					$rst = $mysqli->query($strSQL);
					
					$angkot_id = $mysqli->insert_id;
				}
				else {
					$angkot_id = $rows[0];
				}
				
				
				$strJalan = $data[1];
				$latitude = $data[2];
				$longitude = $data[3];
				
				$strSQL = "INSERT INTO rute SET angkot_id = '$angkot_id', rute_name = '$strJalan', latitude = '$latitude', longitude = '$longitude'";
				$rst = $mysqli->query($strSQL);
				
			}
			
		}
	}
	
	for ($i=0; $i<count($arrFile); $i++) {
		bacaFile($arrFile[$i]);
	}