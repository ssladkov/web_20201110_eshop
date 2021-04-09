<!-- Это главная страница магазина -->
<?php
$template = [
    'title' => 'Eshop: Главная страница',
    'page_css' => 'main.css',
    'page_js' => ['main.js']
];
include($_SERVER['DOCUMENT_ROOT'] . '/parts/functions.php');
include($_SERVER['DOCUMENT_ROOT'] . '/parts/header.php');
?>

<article>
    <h1>Новые поступления весны</h1>
    <h2><i>Мы подготовили для Вас лучшие новинки сезона</i></h2>
    <button>Посмотреть новинки</button>
</article>
<main>
    <main-grid>
        <figure class="grid-item1">
            <img src="/uploads/index/1.jpg" class="grid-img" alt="Image 1">
        </figure>
        <figure class="grid-item2">

        </figure>
        <figure class="grid-item3">
            <img src="/uploads/index/3.jpg" class="grid-img" alt="Image 3">
        </figure>
        <figure class="grid-item4">

        </figure>
        <figure class="grid-item5">
            <img src="/uploads/index/2.jpg" class="grid-img" alt="Image 5">
        </figure>
        <figure class="grid-item6">

        </figure>
        <figure class="grid-item7">
            <img src="/uploads/index/4.jpg" class="grid-img" alt="Image 7">
        </figure>
        <figure class="grid-item8">
            <img src="/uploads/index/6.jpg" class="grid-img" alt="Image 8">
        </figure>
        <figure class="grid-item9">

        </figure>
        <figure class="grid-item10">
            <img src="/uploads/index/5.jpg" class="grid-img" alt="Image 10">
        </figure>
    </main-grid>
</main>


<?php
include($_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php');
?>