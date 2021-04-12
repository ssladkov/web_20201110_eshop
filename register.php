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
                <div class="login">
                    <label for="login" class="required">Выберите никнейм:</label>
                    <input type="text" class="form-control" name="login" id="login" required>
                </div>
                <div class="password">
                    <label for="password" class="required">Пароль:</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                <div class="password_second">
                    <label for="password_second" class="required">Повторите пароль:</label>
                    <input type="password" class="form-control" name="password_second" id="password_second" required>
                    </div>
                <div class="first_name">
                    <label for="first_name" class="required">Имя:</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" required>
                </div>
                <div class="last_name">
                    <label for="last_name" class="required">Фамилия:</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" required>
                </div>
                <div class="email">
                    <label for="email" class="required">Адрес электронной почты:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="phone">
                    <label for="phone" class="required">Телефон:</label>
                    <input type="text" class="form-control" name="phone" id="phone" required>
                </div>
                <div class="submit">
                    <input type="submit" value="Создать пользователя"/>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', ()=> {
        document.querySelector('.lds-backdrop').classList.add('disabled');
    });
</script>