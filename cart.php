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
    <div class="gap">
        <div class="figure"></div>
    </div>
    <div class="form-wrapper">
        <div class="headline">
            <div>
                <h1>Адрес доставки</h1>
                <p>Все поля обязательны для заполнения</p>
            </div>
        </div>
        <div class="form-container">
            <form action="">
                <label for="select">Выберите вариант доставки</label>
                <select>
                    <option>Курьерская служба</option>
                    <option>Самовывоз</option>
                </select>
                <label for="name">Имя</label>
                <label for="surname">Фамилия</label>
                <input class="form-element-small" type="text" name="login" id="login">
                <input class="form-element-small form-element-right" type="text" name="surname" id="surname">

                <label for="adress">Адрес</label>
                <input type="text" name="adress" id="adress">

                <label for="city">Город</label>
                <label for="index">Индекс</label>
                <input class="form-element-small" type="text" name="city" id="city">
                <input class="form-element-small form-element-right" type="text" name="index" id="index">


                <label for="phone">Телефон</label>
                <label for="email">Имейл</label>
                <input class="form-element-small" type="text" name="phone" id="phone">
                <input class="form-element-small form-element-right" type="text" name="email" id="email">
            </form>
        </div>
    </div>
    <div class="gap">
        <div class="figure"></div>
    </div>
    <div class="payment">
        <div class="headline">
            <div>
                <h1>Варианты оплаты</h1>
                <p>Все поля обязательны для заполнения</p>
            </div>
        </div>
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