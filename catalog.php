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
            <ul class="navigation_menu">
                <li><a class="active" href="/index.php">Главная</a></li>  
                <li><a href="/catalog.php?id=1">Мужчинам</a></li>
            </ul>
            <div class="catalog-header-h1"><?=$category['name'];?></div>
            <div class="catalog-header-desc">Все товары</div>
            <div class="catalog-header-filter">
                <div class="catalog-header-filter-item " style="width: 90px">
                    <select name="filter_size">
                        <option>Размер</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                    </select>
                </div>
                <div class="catalog-header-filter-item">
                    <select name="filter_price">
                        <option>Стоимость</option>
                        <option value="0:1000">0 - 1000 руб.</option>
                        <option value="1000:3000">1000 - 3000 руб.</option>
                        <option value="3000:7000">3000 - 7000 руб.</option>
                        <option value="7000:20000">7000 - 20000 руб.</option>
                    </select>
                </div>
                <div class="catalog-header-filter-item">
                    <select name="filter_price">
                        <option>Стоимость</option>
                        <option value="0:1000">0 - 1000 руб.</option>
                        <option value="1000:3000">1000 - 3000 руб.</option>
                        <option value="3000:7000">3000 - 7000 руб.</option>
                        <option value="7000:20000">7000 - 20000 руб.</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="catalog-products" data-category-id="<?=$category['id'];?>"></div>
        <div class="catalog-pagination"></div>
    </div>
</div>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/parts/footer.php');
?> 