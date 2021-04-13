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
        <p class="photo-column">Фото</p>
        <p class="name-column">Наименование</p>
        <p class="size-column">Размер</p>
        <p class="amount-column">Количество</p>
        <p class="price-column">Стоимость</p>
        <p class="delete-column">Удалить</p>
    </div>
    <div class="total">
        <div class="amount">Итого:20 рублей</div>
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