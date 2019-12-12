<?php
	$product_code = $_GET['totalValue'];

	// Открываем документ со сводной таблицей
	$fileCodes = fopen("product-codes.csv", 'rt') or die("Не удалось подключть файл"); 
	$variants = [];
	for($i=0; $codesData = fgetcsv($fileCodes, 1000,";"); $i++) {
		if ($codesData[1] == $product_code) 
		array_push($variants,$codesData);
	}
	fclose($fileCodes); // Закрываем документ со сводной таблицей

	// Открываем документ с данными товаров
	$fileProducts = fopen("product-info.csv", 'rt') or die("Не удалось подключть файл"); 
	for($i=0; $productData = fgetcsv($fileProducts, 1000,";"); $i++) {

		$productSku = $productData[1];
		$productOldSku = $productData[2];
		$productType = $productData[3];
		$productName = $productData[4];
		$productDescripton = $productData[5];
		$productPrice = $productData[6];

		for ( $i=0; count($variants) > $i; $i++ ) {
			for ( $j=0; count($variants[$i]) > $j; $j++ ) {
				if ( $variants[$i][$j] == $productSku) 
				$productResult[] = array(
					'productCode' => $variants[$i][1],
					'variant' => $variants[$i][0],
					'model' => $variants[$i][2],
					'type' => $productType, 
					'name' => $productName,
					'description' => $productDescripton, 
					'price' => $productPrice, 
				);
			}
		}

	}
	fclose($fileProducts); // Закрываем документ с данными товаров

	print_r ($productResult);

	$json = json_encode($productResult, true, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
?>