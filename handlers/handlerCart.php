<?php
//сюда должны приходить через get-запрос
//action get-параметр - говорит, что нужно именно сделать с корзиной
//todo: Сделать проверку на то, что обязательно передаёся action, иначе возвращать через header 400 
include($_SERVER['DOCUMENT_ROOT'] . '/parts/header_conf.php');
if (!isset($_SESSION)) {
    session_start();
};

$action = $_GET['action'];

if ($action == '') {
    header('HTTP/1.1 400 Bad Request');
    die;
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($action == 'show') {
    echo json_encode(array_values($_SESSION['cart']));
}

if ($action == 'add') {
    //todo: проверять на то что передаются обязательные параметры id и количество
    //todo: если в массиве $_SESSION['cart'] уже есть продукт с указанным id, то мы должны просто изменять его количество
    $product_id = $_GET['product_id'];
    $amount = $_GET['amount'];
    $size = $_GET['chosenSize'];

    if ($product_id == '' || $amount == '') {
        header('HTTP/1.1 400 Bad Request');
        die;
    };

    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = [
            'product_id' => $product_id,
            'amount' => 0,
            'size' => $size
        ];
    } else if ($_SESSION['cart'][$product_id]['size'] !== $size) {
        $_SESSION['cart'][$product_id] = [
            'product_id' => $product_id,
            'amount' => 0,
            'size' => $size
        ];
    }
    $_SESSION['cart'][$product_id]['amount'] += $amount;
}
if ($action == 'render') {
    $product_id =  $_GET['product_id'];
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = get_db_one_record($link, $sql);
    if ($result == 404) {
        echo '404';
        die;
    } else {
        echo json_encode($result);
    }
}
