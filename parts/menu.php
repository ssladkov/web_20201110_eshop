
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
        <?php isset($_SESSION['user'])) ? echo `<span>Привет, $_SESSION['user', 1]</span>` : echo ?>
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