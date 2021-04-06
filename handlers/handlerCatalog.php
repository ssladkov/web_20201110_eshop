<?php
/**
 * @var $link string
 */
//Файл для получения данных о каталоге
include($_SERVER['DOCUMENT_ROOT']. '/parts/header_conf.php');

$category_id = $_GET['category_id'];
$per_page = 10;
$filter_price_min = 0;
$filter_price_max = 9999999;

if(isset($_GET['filter_price'])) {
    $filter_arr = explode(':', $_GET['filter_price']);
    $filter_price_min = $filter_arr[0];
    $filter_price_max = $filter_arr[1];
    $filter_price_sql_where_and = " AND price >= '$filter_price_min 'AND price <= '$filter_price_max'";
} else {
    $filter_price_sql_where_and = null;
}
//todo: сделать фильтр для размеров
$current_page = !isset($_GET['page']) ? 1 : $_GET['page'];
$from_record = ($current_page - 1) * $per_page;


$sql_products = "SELECT * FROM products INNER JOIN product_category ON products.id = product_category.product_id WHERE product_category.category_id = {$category_id}" . $filter_price_sql_where_and;
//заменяет * на COUNT(*) в строчке $sql_products
$sql_count_products = str_replace('*', 'COUNT(*)', $sql_products);
$all_records = get_records_agregate_by($link, $sql_count_products);
$pages = ceil($all_records / $per_page);
$response = [
    'products' => get_db_result_assoc($link, $sql_products, null, [$from_record, $per_page]),
    'pagination' => [
        'current_page' => $current_page,
        'pages_count' => $pages,
    ],
];
//$response['products'] = get_db_result_assoc($link, $sql_products);
sleep(1);
echo json_encode($response);