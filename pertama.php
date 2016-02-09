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
				
				$strQuery = "INSERT INTO angkot SET angkot_name = '$strAngkot', angkot_desc='$strAngkot', angkot_price='4000'";
				echo $strQuery."<br />";
				
				
				/*
				$strSelect = "SELECT * FROM angkot WHERE angkot_name = '$strAngkot'";
				$rst = $mysqli->query($strSelect);
				$rows = $rst->fetch_array();
				
				print_r($rows);
				exit;
				
				
				$strQuery = "INSERT INTO angkot SET angkot_name = '$strAngkot'";
				
				echo $strAngkot."<br />";
				*/
			}
			
		}
	}
	
	for ($i=0; $i<count($arrFile); $i++) {
		bacaFile($arrFile[$i]);
	}