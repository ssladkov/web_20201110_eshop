<!-- Это страница вывода каталога -->
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/parts/header_conf.php');
    $category_id = 1;
    if(isset($_GET['id'])) {
        $category_id = $_GET['id'];
    }
    $sql = "SELECT * FROM categories WHERE id = $category_id";
    $category = get_db_one_record($link, $sql);
    if($category == 404) {
        header('HTTP/1.0 404 Not Found');
        die;
    }

    $template = [
        'title' => "Eshop: Каталог: {$category['name']}",
        'page_css' => 'catalog.css',
        'page_js' => ['catalog.js', 'product.js'],
    ];
    include($_SERVER['DOCUMENT_ROOT'].'/parts/header.php');
?>
<div class="wrapper">
    <div class="catalog">
        <div class="catalog-header">
            <div class="catalog-header-h1"><?=$category['name'];?></div>
            <div class="catalog-header-desc">Всё товары</div>
        </div>
        <div class="catalog-products"></div>
        <div class="catalog-pagination"></div>
    </div>
</div>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/parts/footer.php');
?> 