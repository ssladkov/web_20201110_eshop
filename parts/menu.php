<?php
$totalCartAmount = 0;
foreach ($_SESSION['cart'] as $key => $element) {
    $totalCartAmount += $element['amount'];
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
        <a class="a-padding-right">Войти</a>
        <img src="../uploads/icons/bascet.png">
        <a id="cart-amount" href="/cart.php">Корзина (<?php echo $totalCartAmount;  ?>)</a>
    </section>
</header>