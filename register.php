<?php
include($_SERVER['DOCUMENT_ROOT'].'/parts/header_conf.php');
if(isset($_SESSION['user'])) {
    header('Location: /');
    die;
}

$template = [
    'title' => "Eshop: регистрация",
    'page_css' => 'register.css',
    //'page_js' => ['product.js', 'cart.js'],
];
include($_SERVER['DOCUMENT_ROOT'].'/parts/header.php');
?>

<div class="wrapper">
    <div class="registration">
        <form action="/handlers/handlerAuth.php?action=register" method="POST">
            <div class="form_field">
                <h2>Регистрация</h2>
                <label for="login">Выберите никнейм:</label>
                <input type="text" class="form-control required" name="login" id="login">
                <div class="error-text" style="height: 20px; font-size: 10px; color: red"></div>
                <label for="password">Пароль:</label>
                <input type="password" class="form-control required" name="password" id="password">
                <div class="error-text" style="height: 20px; font-size: 10px; color: red"></div>
                <label for="password_second">Повторите пароль:</label>
                <input type="password" class="form-control required" name="password_second" id="password_second">
                <div class="error-text" style="height: 20px; color: red"></div>
                <label for="first_name">Имя:</label>
                <input type="text" class="form-control required" name="first_name" id="first_name">
                <div class="error-text" style="height: 20px; color: red"></div>
                <label for="last_name">Фамилия:</label>
                <input type="text" class="form-control required" name="last_name" id="last_name">
                <div class="error-text" style="height: 20px; color: red"></div>
                <label for="email">Адрес электронной почты:</label>
                <input type="email" class="form-control required" name="email" id="email">
                <div class="error-text" style="height: 20px; color: red"></div>
                <label for="phone">Телефон:</label>
                <input type="text" class="form-control required" name="phone" id="phone">
                <div class="error-text" style="height: 20px; color: red"></div>
                <input type="submit" value="Создать пользователя"/>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', ()=> {
        document.querySelector('.lds-backdrop').classList.add('disabled');
    });
</script>

<script src='/assets/js/validation.js'></script>