<?php

	$product_code = $_GET['totalValue'];

	print $product_code."<br/>";

	$file = fopen("product-info.csv", 'rt') or die("Не удалось подключть файл");
	for($i=0; $data = fgetcsv($file, 1000,";"); $i++) {

		if ($data[0] == $product_code) {
			print_r($data);
		}
	    
	}

	fclose($file);

	

	/*
	    if($data[0] == $product_code) {
	        for ($c=0; $c < $row; $c++) echo "[$c]".$data[$c]."<br>";
	    }
	    */
?>