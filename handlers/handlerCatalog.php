<?php
//Файл для получения данных о каталоге
include($_SERVER['DOCUMENT_ROOT']. '/parts/header_conf.php');
$response = [
    'products' => []
];

$sql_products = "SELECT * FROM products";
$response['products'] = get_db_result_assoc($link, $sql_products);
sleep(3);
echo json_encode($response);