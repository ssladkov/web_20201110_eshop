<?php
//сюда должны приходить через get-запрос
//action get-параметр - говорит, что нужно именно сделать с корзиной
//todo: Сделать проверку на то, что обязательно передаёся action, иначе возвращать через header 400 
include($_SERVER['DOCUMENT_ROOT'] . '/parts/header_conf.php');

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

    $product_ids = array_keys($_SESSION['cart']);
    $product_ids_str = implode(',', $product_ids);
    $sql = "SELECT * FROM products WHERE id IN($product_ids_str)";
    // $result = get_db_result_assoc($link, $sql);
    function get_my_result($link, $sql)
    {
        $result = [];
        $query_result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($query_result)) {
            $currentId = $row['id'];
            $sizeAndAmount = [
                'size' => $_SESSION['cart']["$currentId"]['size'],
                'amount' => $_SESSION['cart']["$currentId"]['amount'],
            ];
            $merge =  array_merge($row, $sizeAndAmount);
            $result[] = $merge;
        }
        return $result;
    };
    $result = get_my_result($link, $sql);
    echo json_encode(array_values($result));
    //     if ($result == 404) {
    //         echo '404';
    //         die;
    //     } else {
    //         echo json_encode($result);
    //     }
}
