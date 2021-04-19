<?php

//экшн показа всех продуктов
if($action == 'products/list') {
    $sql = 'SELECT * FROM products';
    $products = get_db_result_assoc($link, $sql, 'name');
    renderAndDie('products_list', $products);
    //echo '<h1>Products</h1>';
}

if($action == 'categories/list') {
}

function renderAndDie($view, $data) {
    include($_SERVER['DOCUMENT_ROOT']."/admin/views/header.php");
    include($_SERVER['DOCUMENT_ROOT']."/admin/views/$view.php");
    include($_SERVER['DOCUMENT_ROOT']."/admin/views/footer.php");
    die;
}
