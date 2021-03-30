<!-- Это страница вывода каталога -->
<?php
    $template = [
        'title' => 'Eshop: Каталог',
        'page_css' => 'catalog.css',
        'page_js' => ['catalog.js', 'product.js'],
    ];
    include($_SERVER['DOCUMENT_ROOT'].'/parts/functions.php');
    include($_SERVER['DOCUMENT_ROOT'].'/parts/header.php');
?>
<div class="wrapper">
    <div class="catalog">
        <div class="catalog-header">
            <div class="catalog-header-h1">Мужчинам</div>
            <div class="catalog-header-desc">Всё товары</div>
        </div>
        <div class="catalog-products"></div>
        <div class="catalog-pagination"></div>
    </div>
</div>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/parts/footer.php');
?> 