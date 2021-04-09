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
            <label for="login">Выберите никнейм</label>
            <input type="text" class="form-control" name="login" id="login"/>
            <label for="password">Пароль</label>
            <input type="password" class="form-control" name="password" id="password"/>
            <label for="password_second">Повторите пароль</label>
            <input type="password" class="form-control" name="password_second" id="password_second"/>
            <label for="first_name">Имя</label>
            <input type="text" class="form-control" name="first_name" id="first_name"/>
            <label for="last_name">Фамилия</label>
            <input type="text" class="form-control" name="last_name" id="last_name"/>
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" id="email"/>
            <label for="phone">Телефон</label>
            <input type="text" class="form-control" name="phone" id="phone"/>
            <input type="submit" value="Создать пользователя"/>
        </form> 
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', ()=> {
        document.querySelector('.lds-backdrop').classList.add('disabled');
    });
</script>