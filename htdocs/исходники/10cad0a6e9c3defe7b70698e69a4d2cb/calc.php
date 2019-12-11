<?php
$f=fopen("wolf.csv","r") or die("нет файла"); //открытие файла
$op=0;
$op2=0;
$p=0;
for ($i=0;$array=fgetcsv($f,1024,";"); $i++) // начало перебора массива
	 {
//		$j=count($array); //количество элементов массива
		if ($array[0]=="$utepl"&&$array[1]==2) $var2=1; //метка наличия второг варианта
		if ($array[0]=="$utepl"&&$array[1]==1) //условие выбора из массива если совпадает то выводим
		{
		     $op=$op+1;
		               if ($op==1) //выводим шапку первого варианта
				{
				$summ1=$summ1+$array[8];

				      ?><div style="border: 0px solid #ccc;border-radius:  0px;padding: 10px 0px 20px 20px;"><h2 style="font-size: 22px;padding-bottom: 10px;font-style: unset;font: medium;">Основной вариант оборудования</h2>
					<table class="" style="border-color:  black; width: 98%;">
					<tbody style="vertical-align: top;border: 1px solid; border-color:  black;z-index:  100;">
					<tr style="vertical-align: top;border: 1px solid;border-color:  black;z-index:  1000;">
					<th scope="col" class="" style="border-color: #000; border: 1px solid;font-size: 18px;"><b>Артикул</b></th>
					<th scope="col" class="c-product-table__item--border-hidden" style="border-color: #000; border: 1px solid;font-size: 18px;"><b>Описание</b></th>
					<th scope="col" class="" style="font-size: 18px; width: 120px;"><b>Цена с НДС</b></th>
					</tr>
					<tr style="vertical-align: top;border: 1px solid; border-color: #000;">
					<td class="" style="border: 1px solid;vertical-align: top;padding: 5px;text-align: center;">
					<?php echo $array[4]?>
					</td>
					<td class="" style="border: 1px solid;vertical-align: top; text-align: left; padding: 5px;"><?php
						if (strlen($array[6])>2) //выводим картинку если она есть
							{               
				?>
							<img src="/calc/<?php echo $array[6]?>" width="150"  align="left" hspace="20" vspace="20">									
				<?php	} ?>
                                         
					<?php echo $array[5]?>
					</td>
					<td class="" style="text-align: left;border-color: #000;padding:  5px;">
					<?php echo $array[8]?> руб.</td>
					</tr><?php
				} 
				if ($op<>1 && $array[2]==1 && strlen($array[4])>2) //выводим второй элемент
				{
				$summ1=$summ1+$array[8];	
			  	      ?>
					<tr style="vertical-align: top;border: 1px solid; border-color: #000;">
					<td class="" style="border: 1px solid;vertical-align: top;padding: 5px;text-align: center;">
					<?php echo $array[4]?>
					</td>
					<td class="" style="border: 1px solid;vertical-align: top; text-align: left; padding: 5px;">
<?php
						if (strlen($array[6])>2) //выводим картинку если она есть
							{               
				?>
							<img src="/calc/<?php echo $array[6]?>" width="150"  align="left" hspace="20" vspace="20">									
				<?php	} ?>
<?php echo $array[5]?>
					</td>
					<td class="" style="text-align: left;border-color: #000;padding:  5px;">
					<?php echo $array[8]?> руб.</td>
					</tr>
					
					<?php
				}

			 	if ($array[2]==2 && strlen($array[4])>2) //выводим дополнительные элементы
					{
				$summ11=$summ11+$array[8];			
 				$op2=$op2+1;
						if ($op2==1) // выводим шапку доп опций и первый элемент
						  	{
					?>

                                        </tbody></table><br>
<?php		require "plus1.php";?>
                                        <table class="" style="border-color:  black; width: 98%;">
					<tbody style="vertical-align: top;border: 1px solid; border-color:  black;z-index:  100;">
					<tr style="vertical-align: top;border: 1px solid; border-color: #000;">
					<td colspan="3" class="" style="border: 1px solid;vertical-align: top;padding: 5px;text-align:  center;">Дополнительные опции</td>
                                        </tr>
					<tr style="vertical-align: top;border: 1px solid; border-color: #000;">
					<td class="" style="border: 1px solid;vertical-align: top;padding: 5px;text-align: center;">
					<?php echo $array[4]?>
					</td>
					<td class="" style="border: 1px solid; text-align: left; vertical-align: top;padding: 5px;">
<?php
						if (strlen($array[6])>2) //выводим картинку если она есть
							{               
				?>
							<img src="/calc/<?php echo $array[6]?>" width="150"  align="left" hspace="20" vspace="20">									
				<?php	} ?>
                                         
					
<?php echo $array[5]?>
					</td>
					<td class="" style="text-align: left;border-color: #000;padding:  5px;  width: 120px;">
					<?php echo $array[8]?> руб.</td>
					</tr><?php

							}	

                               	if ($op2<>1 && $array[2]==2 && strlen($array[4])>2) //выводим второй элемент
				{
				      ?>
					<tr style="vertical-align: top;border: 1px solid; border-color: #000;">
					<td class="" style="border: 1px solid;vertical-align: top;padding: 5px;text-align: center;">
					<?php echo $array[4]?>
					</td>
					<td class="" style="border: 1px solid;text-align: left; vertical-align: top;padding: 5px;">
<?php
						if (strlen($array[6])>2) //выводим картинку если она есть
							{               
				?>
							<img src="/calc/<?php echo $array[6]?>" width="150"  align="left" hspace="20" vspace="20">									
				<?php	} ?>
                                         
					
<?php echo $array[5]?>
					</td>
					<td class="" style="text-align: left;border-color: #000;padding:  5px;">
					<?php echo $array[8]?> руб.</td>
					</tr><?php
				}

					}


		}
	}

?>
</tbody></table>
<?php		require "plus2.php";?>
<p><b>Стоимость оборудования без доп. опций: <?php echo number_format($summ1, 0, '.', ' ')?> руб. (цена указана с НДС)<br>
Стоимость оборудования с доп. опциями: <?php echo number_format($summ11+$summ1, 0, '.', ' ')?> руб. (цена указана с НДС)</b>
</p>
<div class="fixedbut" onclick="location.href='p.php#mail'">

<style>
.fixedbut { position: fixed; bottom: 20px; right: 5px; display: block; text-decoration: none; padding: 6px 0px; font-size: 17px;}
.fixedbut:hover { }
</style>
<button data-animation-modifier="arrowRight" class="o-interface-animations o-interface-animations-blockbutton" type="submit" style="float:right; background: red;">
                    <span class="o-interface-animations__label" style="color: white;">Заказ консультации</span>

                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="95px" height="95px" viewBox="0 0 95 95" style="enable-background:new 0 0 95 95;" xml:space="preserve">
                                <polyline class="o-interface-animations__icon" points="37.962,32.104 53.038,48.402 37.962,62.896 " data-svg-origin="45.5 47.5" transform="matrix(1,0,0,1,0,0)" style="opacity: 1; transform-origin: 0px 0px 0px;"></polyline>
                                <rect class="o-interface-animations__fillrect" width="95" height="95"></rect>
                            </svg>
                    </button>
	</div>

</div>

<?php
	fclose($f);




//выводим второй вариант

$op=0;
$op2=0;
$f=fopen("wolf.csv","r") or die("нет файла"); //открытие файла

$p=0;
for ($i=0;$array=fgetcsv($f,1024,";"); $i++) // начало перебора массива
	 {
//		$j=count($array); //количество элементов массива
		if ($array[0]=="$utepl"&&$array[1]==2) //условие выбора из массива если совпадает то выводим
		{
			$op=$op+1;
		               if ($op==1) //выводим шапку первого варианта
				{
				$summ2=$summ2+$array[8];										     
				      ?><br><br><div style="border: 0px solid #ccc;border-radius:  0px;padding: 10px 0px 20px 20px;"><h2 style="font-size:  22px;padding-bottom: 10px;">Альтернативный вариант оборудования</h2>
					<table class="" style="border-color:  black; width: 98%;">
					<tbody style="vertical-align: top;border: 1px solid; border-color:  black;z-index:  100;">
					<tr style="vertical-align: top;border: 1px solid;border-color:  black;z-index:  1000;">
					<th scope="col" class="" style="border-color: #000;  border: 1px solid;font-size: 18px;"><b>Артикул</b></th>
					<th scope="col" class="c-product-table__item--border-hidden" style="border-color: #000; border: 1px solid;font-size: 18px;"><b>Описание</b></th>
					<th scope="col" class="" style="font-size: 18px; width: 120px;"><b>Цена с НДС</b></th>
					</tr>
					<tr style="vertical-align: top;border: 1px solid; border-color: #000;">
					<td class="" style="border: 1px solid;vertical-align: top;padding: 5px;text-align: center;">
					<?php echo $array[4]?>
					</td>
					<td class="" style="border: 1px solid;vertical-align: top;padding: 5px;text-align: left;">
<?php
						if (strlen($array[6])>2) //выводим картинку если она есть
							{               
				?>
							<img src="/calc/<?php echo $array[6]?>" width="150"  align="left" hspace="20" vspace="20">									
				<?php	} ?>
                                         
					
<?php echo $array[5]?>
					</td>
					<td class="" style="text-align: left;border-color: #000;padding:  5px;">
					<?php echo $array[8]?> руб.</td>
					</tr><?php
				} 
				if ($op<>1 && $array[2]==1 && strlen($array[4])>2) //выводим второй элемент
				{
				$summ2=$summ2+$array[8];										     				
				        ?>
					<tr style="vertical-align: top;border: 1px solid; border-color: #000;">
					<td class="" style="border: 1px solid;vertical-align: top;padding: 5px;text-align: center;">
					<?php echo $array[4]?>
					</td>
					<td class="" style="border: 1px solid;vertical-align: top;padding: 5px;text-align: left;">
<?php
						if (strlen($array[6])>2) //выводим картинку если она есть
							{               
				?>
							<img src="/calc/<?php echo $array[6]?>" width="150"  align="left" hspace="20" vspace="20">									
				<?php	} ?>
                                         
					
<?php echo $array[5]?>
					</td>
					<td class="" style="text-align: left;border-color: #000;padding:  5px;">
					<?php echo $array[8]?> руб.</td>
					</tr><?php
				}

			 	if ($array[2]==2 && strlen($array[4])>2) //выводим дополнительные элементы
					{
						$summ22=$summ22+$array[8];								
						$op2=$op2+1;
						if ($op2==1) // выводим шапку доп опций и первый элемент
						  	{
					?>
                                        </tbody></table><br>
<?php		require "plus1.php";?>
					<table class="" style="border-color:  black; width: 98%;">
					<tbody style="vertical-align: top;border: 1px solid; border-color:  black;z-index:  100;">
					<tr style="vertical-align: top;border: 1px solid; border-color: #000;">
					<td colspan="3" class="" style="border: 1px solid;vertical-align: top;padding: 5px;text-align:  center;">Дополнительные опции</td>
                                        </tr>
					<tr style="vertical-align: top;border: 1px solid; border-color: #000;">
					<td class="" style="border: 1px solid;vertical-align: top;padding: 5px;text-align: center;">
					<?php echo $array[4]?>
					</td>
					<td class="" style="border: 1px solid;vertical-align: top;padding: 5px;text-align: left;">
<?php
						if (strlen($array[6])>2) //выводим картинку если она есть
							{               
				?>
							<img src="/calc/<?php echo $array[6]?>" width="150"  align="left" hspace="20" vspace="20">									
				<?php	} ?>
                                         
					
<?php echo $array[5]?>
					</td>
					<td class="" style="text-align: left;border-color: #000;padding:  5px;  width: 120px;">
					<?php echo $array[8]?> руб.</td>
					</tr><?php

							}	

                               	if ($op2<>1 && $array[2]==2 && strlen($array[4])>2) //выводим второй элемент
				{
				      ?>
					<tr style="vertical-align: top;border: 1px solid; border-color: #000;">
					<td class="" style="border: 1px solid;vertical-align: top;padding: 5px;text-align: center;">
					<?php echo $array[4]?>
					</td>
					<td class="" style="border: 1px solid;vertical-align: top;padding: 5px; text-align: left;">
<?php
						if (strlen($array[6])>2) //выводим картинку если она есть
							{               
				?>
							<img src="/calc/<?php echo $array[6]?>" width="150"  align="left" hspace="20" vspace="20">									
				<?php	} ?>
                                         
					
<?php echo $array[5]?>
					</td>
					<td class="" style="text-align: left;border-color: #000;padding:  5px;">
					<?php echo $array[8]?> руб.</td>
					</tr><?php
				}

					}


		}

	}

	fclose($f);

if ($var2==1) 
	{
		?></tbody></table>
<?php		require "plus2.php";?>

<p><b>Стоимость оборудования без доп. опций: <?php echo number_format($summ2, 0, '.', ' ')?> руб. (цена указана с НДС)<br>
Стоимость оборудования с доп. опциями: <?php echo number_format($summ22+$summ2, 0, '.', ' ')?> руб. (цена указана с НДС)</b>
		</p>
		</div>
	<?php
	}

		require "mail.php";

?>

    </div>
    </div>