<?php
    $totalCartAmount = 0;
    if(isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $element) {
            $totalCartAmount += $element['amount'];
        }
    }
?>
<header>
    <nav>
        <a href="/"><img class="logo" src="../uploads/icons/logo.jpg"></a>
        <a class="menu-item" href="/catalog.php?id=1">Мужчинам</a>
        <a class="menu-item" href="/catalog.php?id=2">Женщинам</a>
        <a class="menu-item" href="/catalog.php?id=3">Аксессуары</a>
        <a class="menu-item" href="">О нас</a>
    </nav>
    <section class="cart">
        <img src="../uploads/icons/account.png">
        <div class="login_registration">
        <?php if(isset($_SESSION['user'])) : ?>
            <span>Привет, <?=$_SESSION['user']['name'];?></span>
        <?php else : ?>
            <a href="/auth.php" class="login">Войти</a>
            <span>/</span>
            <a href="/register.php" class="registration">Регистрация</a>
        <?php endif?>
        </div>
        <div class="logout">
            <span>(Выйти)</span>
        </div>
        <img src="../uploads/icons/bascet.png">
        <a href="/cart.php">Корзина</a>
    </section>
</header>