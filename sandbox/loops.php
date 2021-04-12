<?php
    //echo $_SERVER['DOCUMENT_ROOT'];
    $title = 'Песочница: разбираем циклы';
    include($_SERVER['DOCUMENT_ROOT'].'/parts/head.php');
    include($_SERVER['DOCUMENT_ROOT'].'/functions.php');
?>
<body>
    <div class="wrapper">
        <h1>Циклы в PHP</h1>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/parts/header.php'); ?>
        <div class="about-text" style="margin-top: 75px;">
        <?php 
            //цикл for используется, когда точно
            //известно или определено количество итераций цикла
            //for($i = 100; $i >= 0; $i = $i -2)
            for($i = 100; $i >= 0; $i--) {
                if($i % 2 != 0) {
                    //continue прерывает текущую итерацию цикла, переходя к следующей
                    continue;
                }
                if($i < 50) {
                    //break прерывает текущую итерацию цикла и выходит из цикла
                    break;
                }
                echo $i . '<br>';
            }

            echo 'Цикл for закончен!';

            //while выполняется до тех пор, пока выражение в скобках истино (true)
            $i2 = 0;
            while($i2 <= 100) {
                echo $i2 . '<br>';
                $i2++;
            }

            echo 'Цикл while закончен!' . '<br>';

            $person = [
                'name' => 'Сергей',
                'occupation' => 'Разработчик',
                'address' => 'Москва'
            ];

            //foreach принимает массив первым параметром
            //и далее после ключевого слова as
            //кладёт либо значение в указанную переменную
            //если указана одна переменная, либо индекс (ключ) + значение, если указаны 2 переменных
            foreach($person as $key => $value) {
                if($key == 'name') {
                    echo "<b>$value</b><br>";
                } elseif($key == 'occupation') {
                    echo "<u>$value</u><br>";
                } else {
                    echo "<i>$value</i><br>";
                }
            }
        ?>
        </div>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/parts/footer.php'); ?>
    </div>
</body>
</html>