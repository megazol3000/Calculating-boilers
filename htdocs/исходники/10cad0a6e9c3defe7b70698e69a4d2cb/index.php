<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body class="p-subpage" id="link-to-top">
    <form method="post" action=/#calc> 
        <label for="utepl">Выберите качество утепления дома</label>
        <select name="utepl" style="font-size: inherit;">
            <option value="0.12">не утеплен, без минеральной ваты и пенопласта</option>
            <option value="0.09">утеплен (мин. вата, пенопласт, толщина утепления 5-10 см)</option>
            <option value="0.06">хорошо утеплен (мин. вата, пенопласт, толщина утепления 15 см и более)</option>
        </select>
        <div class="select-arrow"></div>
        
        
            <label for="baf">Укажите количество ванных комнат</label><br>
            <select name="baf" style="font-size: inherit;">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3 и более</option>
            </select>
            <div class="select-arrow"></div>
        
        
            <label for="vid">Вид отопления</label><br>
            <select name="vid" style="font-size: inherit;">
                <option value="1">радиатор</option>
                <option value="2">теплый пол</option>
                <option value="3">комбинированный</option>
                <option value="4">не знаю</option>
            </select>
            <div class="select-arrow"></div>
        
        <div>
            <label for="s">Площадь здания (м²)</label>
            <input type="number" placeholder="|" name="s" required>
        </div>

        
        <button data-animation-modifier="arrowRight" class="o-interface-animations o-interface-animations-blockbutton" type="submit" style="float:right">
            <span class="o-interface-animations__label">Подобрать</span>
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="95px" height="95px" viewBox="0 0 95 95" style="enable-background:new 0 0 95 95;" xml:space="preserve">
                <polyline class="o-interface-animations__icon" points="37.962,32.104 53.038,48.402 37.962,62.896 " data-svg-origin="45.5 47.5" transform="matrix(1,0,0,1,0,0)" style="opacity: 1; transform-origin: 0px 0px 0px;"></polyline>
                <rect class="o-interface-animations__fillrect" width="95" height="95"></rect>
            </svg>
        </button>
    </form>
    
    <?php 

    if (($_POST['s'])!= null ) 
        {
            $power_k = str_replace('-', '', $_POST['s'])*$_POST['utepl'];
            if ($power_k > 0 and $power_k < 21) $power_k = 20;
            if ($power_k >= 21 and $power_k < 29) $power_k = 28;
            if ($power_k >= 29 && $power_k < 42) $power_k = 41;
            if ($power_k >= 42 && $power_k < 66) $power_k = 65;
            if ($power_k >= 66 && $power_k < 86) $power_k = 85;
            if ($power_k >= 86) $power_k = 85;

            if ($_POST['utepl']== 0.12) $utep="не утеплен, без минеральной ваты и пенопласта";
            if ($_POST['utepl']== 0.09) $utep="утеплен (мин. вата, пенопласт, толщина утепления 5-10 см)";
            if ($_POST['utepl']== 0.06) $utep="хорошо утеплен (мин. вата, пенопласт, толщина утепления 15 см и более)";

            if ($_POST['baf']== 1) $baf="1";
            if ($_POST['baf']== 2) $baf="2";
            if ($_POST['baf']== 3) $baf="3 и более";

                if ($_POST['vid']== 1) $vid="радиатор";
                if ($_POST['vid']== 2) $vid="теплый пол";
                if ($_POST['vid']== 3) $vid="комбинированный";
                if ($_POST['vid']== 4) $vid="не знаю";


            $spl= $_POST['s'];

            
            $utepl = $power_k.$_POST['baf'];
            echo "<a name='calc'><br></a><br>&nbsp";

            require "calc.php";
        }

    if (($_POST['NNN'])!= null ) 
        {
            echo "<a name='calc2'><br></a><br>&nbsp";
            require_once "mail-main.php";

        }

?>
    </div>
    </div>
</body>

</html>