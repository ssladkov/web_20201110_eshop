<?php
//Файл для получения данных о каталоге
include($_SERVER['DOCUMENT_ROOT']. '/parts/header_conf.php');
$category_id = $_GET['category_id'];
$response = [
    'products' => []
];

$sql_products = "SELECT * FROM products INNER JOIN product_category ON products.id = product_category.product_id WHERE product_category.category_id = {$category_id}";
$response['products'] = get_db_result_assoc($link, $sql_products);
sleep(1);
echo json_encode($response);