<?php
	$arrFile = array("ADL.txt", "AG.txt", "GA.txt");
	
	function bacaFile($namafile) {
		
		global $dir;
		
		$file = fopen(getcwd()."/".$namafile, "r");
		$baris = fgets($file);
		
		while(($baris = fgets($file)) ==! FALSE) {
			
			$data = explode(",", $baris);
			
			if (count($data) > 3) {
				$strAngkot = $data[1];
				echo $strAngkot."<br />";
			}
			
		}
	}
	
	for ($i=0; $i<count($arrFile); $i++) {
		bacaFile($arrFile[$i]);
	}