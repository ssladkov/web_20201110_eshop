<?php
//сюда должны приходить через get-запрос
//action get-параметр - говорит, что нужно именно сделать с корзиной
//todo: Сделать проверку на то, что обязательно передаёся action, иначе возвращать через header 400 

session_start();
$action = $_GET['action'];

if ($action == '') {
    header('HTTP/1.1 400 Bad Request');
    die;
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($action == 'show') {
    echo json_encode($_SESSION['cart']);
}

if ($action == 'add') {
    //todo: проверять на то что передаются обязательные параметры id и количество
    //todo: если в массиве $_SESSION['cart'] уже есть продукт с указанным id, то мы должны просто изменять его количество
    $product_id = $_GET['product_id'];
    $amount = $_GET['amount'];
    $add_new_element = true;
    if ($product_id == '' || $amount == '') {
        header('HTTP/1.1 400 Bad Request');
        die;
    };

    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['product_id'] == $product_id) {
            $_SESSION['cart']["${key}"]['amount'] = $_SESSION['cart']["${key}"]['amount'] + 1;

            $add_new_element = false;
        }
    }

    if ($add_new_element == true) {
        $_SESSION['cart'][] = [
            'product_id' => $product_id,
            'amount' => $amount
        ];
    }
}
