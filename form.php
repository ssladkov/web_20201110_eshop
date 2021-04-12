<?php
    $title = 'Это другая страница';
    include($_SERVER['DOCUMENT_ROOT'].'/parts/head.php');
    include($_SERVER['DOCUMENT_ROOT'].'/functions.php');
?>
<body>
    <div class="wrapper">
        <?php include('parts/header.php'); ?>
        <div class="about-text" style="margin-top: 75px;">

        <?php if(!empty($_POST)) {
            if ($_POST['budget'] >= 50000) { 
                $message = 'Спасибо за ваше обращение наши менеджеры вам '; 
                if($_POST['method'] == 'phone') {
                    //$message = $message . 'перезвонят' 
                    $message .= 'перезвонят';
                } elseif($_POST['method'] == 'email') {
                    $message .= 'напишут';
                } else {
                    $message .= 'напишут в WhatsApp';
                }
                if(!empty($_POST['country'])) {
                    $image = 'assets/images/';
                    $select_to_images = [
                        'russia' => 'moscow.png',
                        'europe' => 'big-ben.png',
                        'africa' => 'pyramids.png',
                        'north-america' => 'north-america.png',
                        'south-america' => 'south-america.png',
                        'australia' => 'kangaroo.png'
                    ];
                    $image .= $select_to_images[$_POST['country']];
                }
                $fields = ['fio', 'email', 'phone', 'message', 'budget', 'country', 'persons', 'method'];
                
                $insert_result = insert_db_row($link, 'orders', $fields, $_POST);

                //insert_result - это теперь массив с двумя ключами
                //error_msg 
                //last_id 
                if($insert_result['error_msg']) {
                    echo $insert_result['error_msg'];
                    die;
                }

                //теперь в $_POST["services"] будут храниться айдишники переданных опций
                if(!empty($_POST["services"]) && ($order_id = $insert_result['last_id']) > 0) {
                    //обходим эти айдишники
                    foreach($_POST["services"] as $service_id) {
                        //для каждого из них создаём запись в связующей таблице
                        // mysqli_query($link, "INSERT INTO orders_to_services (order_id, service_id) VALUES ($order_id, $service_id)");
                        insert_db_row($link, 'orders_to_services', ['order_id', 'service_id'], ['order_id' => $order_id, 'service_id' => $service_id]);
                    }
                }
                if($insert_result['error_msg'] == '') {
                    echo 'Данные сохранены!<br>';
                }
            } else {
                $message = 'К сожалению, мы не сможем подобрать для вас тур в рамках указанного вами бюджета. Вам необходимо ещё: ' . (50000 - (int) $_POST['budget']);
            }
        } else {
            $message = 'Форма не заполнена!';
        }
        ?>
        <?php 
        // Вместо {} для ветвлений и циклов мы можем использовать ':' + endif/endforeach
        if(isset($image)) : ?>
            <img src="<?=$image;?>" width="200"><br/>
        <?php endif; ?>
        <div><?=$message;?></div>
        </div>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/parts/footer.php'); ?>
    </div>
</body>
</html>