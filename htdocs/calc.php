<?php

	$product_code = $_GET['totalValue'];
	$setCodes2 = 0;
	$firstVarBoiler = 0;
	$firstVarSensor = 0;
	$firstVarKotel = 0;

	print $product_code."<br/>";

$fileCodes = fopen("product-codes.csv", 'rt') or die("Не удалось подключть файл"); // Открываем документ со сводной таблицей

		for($i=0; $codesData = fgetcsv($fileCodes, 1000,";"); $i++) {
			if ($codesData[1] == $product_code && $codesData[0] == 1) {
				$setCodes1 = $codesData;
			}	
			elseif ($codesData[1] == $product_code && $codesData[0] == 2)	{
				$setCodes2 = $codesData;
			}	    
		}
			$codesArray = array( $setCodes1, $setCodes2 );
			//print_r($codesArray);

fclose($fileCodes); // Закрываем документ со сводной таблицей



$fileProducts = fopen("product-info.csv", 'rt') or die("Не удалось подключть файл"); // Открываем документ с данными товаров
		for($j=0; $productData = fgetcsv($fileProducts, 1000,";"); $j++) {

			if($productData[0] == $codesArray[0][1] && $productData[1] == 1 && $productData[4] == $codesArray[0][3] && $productData[2] == 1 && $productData[4] != 0) {
				$firstVarKotel = $productData;																				
			} elseif ($productData[0] == $codesArray[0][1] && $productData[1] == 1 && $productData[4] == $codesArray[0][4] && $productData[2] == 1  && $productData[4] != 0) {
				$firstVarBoiler = $productData;                                                                             
			} elseif ($productData[0] == $codesArray[0][1] && $productData[1] == 1 && $productData[4] == $codesArray[0][5] && $productData[2] == 1  && $productData[4] != 0) {
				$firstVarSensor = $productData;
			} elseif ($productData[0] == $codesArray[0][1] && $productData[1] == 1 && $productData[4] == $codesArray[0][6] && $productData[2] == 2  && $productData[4] != 0) {
				$firstVarAdd1 = $productData;
			} elseif ($productData[0] == $codesArray[0][1] && $productData[1] == 1 && $productData[4] == $codesArray[0][7] && $productData[2] == 2  && $productData[4] != 0) {
				$firstVarAdd2 = $productData;
			} elseif ($productData[0] == $codesArray[0][1] && $productData[1] == 1 && $productData[4] == $codesArray[0][8] && $productData[2] == 2  && $productData[4] != 0) {
				$firstVarAdd3 = $productData;
			} elseif ($productData[0] == $codesArray[0][1] && $productData[1] == 1 && $productData[4] == $codesArray[0][9] && $productData[2] == 2  && $productData[4] != 0) {
				$firstVarAdd4 = $productData;
			} elseif ($productData[0] == $codesArray[0][1] && $productData[1] == 1 && $productData[4] == $codesArray[0][10] && $productData[2] == 2  && $productData[4] != 0) {
				$firstVarAdd5 = $productData;
			} elseif ($productData[0] == $codesArray[0][1] && $productData[1] == 1 && $productData[4] == $codesArray[0][11] && $productData[2] == 2  && $productData[4] != 0) {
				$firstVarAdd6 = $productData;
			} elseif ($productData[0] == $codesArray[0][1] && $productData[1] == 1 && $productData[4] == $codesArray[0][12] && $productData[2] == 2  && $productData[4] != 0) {
				$firstVarAdd7 = $productData;
			}
		}


			$firstVarBasic = array($firstVarKotel, $firstVarBoiler, $firstVarSensor);
			//Массив основного КОТЛА, БОЙЛЕРА и ДАТЧИКА
			$firstVarAdditions = array($firstVarAdd1, $firstVarAdd2, $firstVarAdd3, $firstVarAdd4, $firstVarAdd5, $firstVarAdd6, $firstVarAdd7);
			//Массив доп. товаров первого варианта
			$firstVar = array($firstVarBasic, $firstVarAdditions);
			//Массив первого варианта - ОСНОВА + ДОПКИ
			print_r($firstVar);


fclose($fileProducts); // Закрываем документ с данными товаров


?>