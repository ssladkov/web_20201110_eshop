<?php
include($_SERVER['DOCUMENT_ROOT'].'/parts/header_conf.php');
$template = [
    'title' => "Eshop: авторизация",
    'page_css' => 'register.css',
    //'page_js' => ['product.js', 'cart.js'],
];
include($_SERVER['DOCUMENT_ROOT'].'/parts/header.php');
?>

<div class="wrapper">
    <div class="registration">
        <form action="/handlers/handlerAuth.php?action=auth" method="POST">
            <div class="form_field">
                <h2>Авторизация</h2>
                <div class="login">
                    <label for="login" class="required">Логин:</label>
                    <input type="text" class="form-control" name="login" id="login" required>
                </div>
                <div class="password">
                    <label for="password" class="required">Пароль:</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="submit">
                    <input type="submit" value="Авторизоваться"/>
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