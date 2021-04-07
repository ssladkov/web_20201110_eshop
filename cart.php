<?php
include($_SERVER['DOCUMENT_ROOT'] . '/parts/header_conf.php');

$template = [
    'title' => "Eshop: Корзина}",
    'page_css' => 'cart.css',
    'page_js' => ['cart.js', 'cartRender.js']
];
include($_SERVER['DOCUMENT_ROOT'] . '/parts/header.php');
?>

<div class="cart">

</div>







<?php
include($_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php');
?>