<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Калькулятор</title>
	<link rel="stylesheet" href="style/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

	<div class="form-wrap">
		<form method="post" action="javascript:void(0);"> 
		

		        <label for="utepl">Выберите качество утепления дома</label>
		        <select id="utp" name="utepl">
		            <option value="0.12">не утеплен, без минеральной ваты и пенопласта</option>
		            <option value="0.09">утеплен (мин. вата, пенопласт, толщина утепления 5-10 см)</option>
		            <option value="0.06">хорошо утеплен (мин. вата, пенопласт, толщина утепления 15 см и более)</option>
		        </select>
		

		        <label for="baf">Укажите количество ванных комнат</label><br>
		        <select id="quantity" name="baf">
		            <option value="1">1</option>
		            <option value="2">2</option>
		            <option value="3">3 и более</option>
		        </select>
       
		        <label for="s">Площадь здания (м²)</label>
		        <input id="square" type="number" placeholder="|" name="s" required>
		        
		
				<input type="submit" onclick="calc()" value="Подобрать">
		</form>
	</div>

	<pre>
	<div class="result wrap">

		
			
		
		
	</div>

	<div class="additional wrap">
		


	</div>
	</pre>

	<script src="calc.js"></script>

</body>
</html>