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
                <label for="login" class="required">Выберите никнейм:</label>
                <input type="text" class="form-control" name="login" id="login" required>
                <div class="error-text" style="height: 20px; font-size: 10px; color: red"></div>
                <label for="password" class="required">Пароль:</label>
                <input type="password" class="form-control" name="password" id="password" required>
                <div class="error-text" style="height: 20px; font-size: 10px; color: red"></div>
                <label for="password_second" class="required">Повторите пароль:</label>
                <input type="password" class="form-control" name="password_second" id="password_second" required>
                <div class="error-text" style="height: 20px; color: red"></div>
                <label for="first_name" class="required">Имя:</label>
                <input type="text" class="form-control" name="first_name" id="first_name" required>
                <div class="error-text" style="height: 20px; color: red"></div>
                <label for="last_name" class="required">Фамилия:</label>
                <input type="text" class="form-control" name="last_name" id="last_name" required>
                <div class="error-text" style="height: 20px; color: red"></div>
                <label for="email" class="required">Адрес электронной почты:</label>
                <input type="email" class="form-control" name="email" id="email" required>
                <div class="error-text" style="height: 20px; color: red"></div>
                <label for="phone" class="required">Телефон:</label>
                <input type="text" class="form-control" name="phone" id="phone" required>
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