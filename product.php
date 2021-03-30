<?php
if(empty($_GET['id'])) {
    //Если $_GET['id'] не передан, редирект на страницу каталога
    header('Location: /catalog.php');
}
include($_SERVER['DOCUMENT_ROOT'].'/parts/header_conf.php');
$sql = "SELECT * FROM products WHERE id = {$_GET['id']}";
$product = get_db_one_record($link, $sql);

if($product == 404) {
    header('HTTP/1.0 404 Not Found');
    die;
}

$template = [
    'title' => "Eshop: {$product['name']}",
    'page_css' => 'product.css',
    'page_js' => ['product.js'],
];
include($_SERVER['DOCUMENT_ROOT'].'/parts/header.php');
?>

<div class="wrapper">
    <div class="product">
        <div class="product-photo" style="background-image:url(/uploads/images/<?=$product['image'];?>)"></div>
        <div class="product-h1"><?=$product['name'];?></div>
        <div class="product-sku">Артикул: <?=$product['sku'];?></div>
        <div class="product-price"><?=$product['price'];?></div>
        <div class="product-description"><?=$product['description'];?></div>
        <div class="product-add-to-cart">Добавить в корзину</div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', ()=> {
        document.querySelector('.lds-backdrop').classList.add('disabled');
    });
</script>