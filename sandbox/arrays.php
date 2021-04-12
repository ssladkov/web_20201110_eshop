<?php
    $title = 'Это другая страница';
    include('parts/head.php');
    include('functions.php');
?>
<body>
    <div class="wrapper">
        <?php include('parts/header.php'); ?>
        <div class="about-text" style="margin-top: 75px;">
        <?php 
        $result = 
            [
                [
                    'name' => 'Квантовый ПК',
                    'color' => 'чёрный',
                    'price' => '$100000',
                    'chars' => [
                        'speed' => 'неограниченная скорость',
                        'ram_value' => 'неограниченная память',
                        'power' => '2000 МВт'
                    ]
                ]
            ]; 
        echo "{$result[0]['name']} {$result[0]['color']} {$result[0]['price']} " . implode(' ', $result[0]['chars']);
        ?>

        </div>
        <?php include('parts/footer.php'); ?>
    </div>
</body>
</html>