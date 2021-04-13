<?php
include($_SERVER['DOCUMENT_ROOT'] . '/parts/header_conf.php');

$template = [
    'title' => "Eshop: Корзина",
    'page_css' => 'cart.css',
    'page_js' => ['cart.js']
];
include($_SERVER['DOCUMENT_ROOT'] . '/parts/header.php');
?>

<div class="wrapper">
    <div class="headline">
        <div>
            <h1>Ваша Корзина</h1>
            <p>Товары резервируются на ограниченное время</p>
        </div>
    </div>
    <div class="table-column-names">
        <p>Фото</p>
        <p>Наименование</p>
        <p>Размер</p>
        <p>Количество</p>
        <p>Стоимость</p>
        <p>Удалить</p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('.lds-backdrop').classList.add('disabled');
    });
    let cartPage = true;
</script>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php');
?>