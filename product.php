<?php
if(empty($_GET['id'])) {
    //Если $_GET['id'] не передан, редирект на страницу каталога
    header('Location: /catalog.php');
}
include($_SERVER['DOCUMENT_ROOT'].'/parts/header_conf.php');
$sql = "SELECT * FROM products WHERE id = {$_GET['id']}" ;
$product = get_db_one_record($link, $sql);

if($product == 404) {
    header('HTTP/1.0 404 Not Found');
    die;
}
$sql_sizes = "SELECT sizes.* FROM sizes INNER JOIN product_size ps on ps.size_id = sizes.id WHERE ps.product_id = {$_GET['id']}";
$product_sizes = get_db_result_assoc($link, $sql_sizes);

//хлебные крошки для страницы продукта
$breadcrumbs = [
    ['label' => 'Главная', 'link' => '/'],
    ['label' => 'Каталог', 'link' => '/catalog.php'],
    ['label' => $product['name'], 'link' => '/product.php?id=' . $product['id']],
];
$template = [
    'title' => "Eshop: {$product['name']}",
    'page_css' => 'product.css',
    'page_js' => ['product.js', 'cart.js'],
    'breadcrumbs' => $breadcrumbs,
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
        <?php if(!empty($product_sizes)) : ?>
        <div class="product-size">Размер</div>
        <div class="product-dimensions">
            <?php foreach($product_sizes as $product_size) : ?>
                <!--
                this в onclick передаст DOM-элемент, в котором onlick
                -->
                <div class="size" onclick="cart.setProductSize(this);"><?=$product_size['label'];?></div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <div class="product-add-to-cart" onclick="cart.add(<?=$product['id'];?>, 1);">Добавить в корзину</div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', ()=> {
        document.querySelector('.lds-backdrop').classList.add('disabled');
    });
</script>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/parts/footer.php');
?>  