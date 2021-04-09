<?php
include($_SERVER['DOCUMENT_ROOT'] . '/parts/header_conf.php');

$template = [
    'title' => "Eshop: Корзина}",
    'page_css' => 'cart.css',
    'page_js' => ['cart.js']
];
include($_SERVER['DOCUMENT_ROOT'] . '/parts/header.php');
?>

<div class="cart">

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