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
    <div class="grid">
        <figure class="grid-item grid-item1">
            <img src="/uploads/index/1.jpg" class="grid-img" alt="Image 1">
            <h1>Джинсовые куртки <br><span>New arrival</span></h1>
        </figure>
        <figure class="grid-item2">
            <div class="grid-text-container">
                <div><img src="/uploads/icons/attention-sign-outline.png"></div>
                <p><span>Каждый день мы подготавливаем для Вас искючительно новую модную одежду. Следите за нашими новинками!</span></p>
            </div>
        </figure>
        <figure class="grid-item3">
            <img src="/uploads/index/3.jpg" class="grid-img" alt="Image 3">
        </figure>
        <figure class="grid-item4">
            <div class="grid-text-container">
                <div><img src="/uploads/icons/left-arrow.png" class="grid-img" alt="Image 4"></div>
                <h1>Элегантная обувь<br><span>Ботинки,кроссовки</span></h1>
            </div>
        </figure>
        <figure class="grid-item5">
            <img src="/uploads/index/2.jpg" class="grid-img" alt="Image 5">
            <h1>Джинсы<br><span>от 3200 руб.</span></h1>
        </figure>
        <figure class="grid-item6">
            <div class="grid-text-container">
                <div><img src="/uploads/icons/attention-sign-outline.png"></div>
                <p><span>Самые низкие цены в Москве. Нашли дешевле? Вернем разницу!</span></p>
            </div>
        </figure>
        <figure class="grid-item7">
            <img src="/uploads/index/4.jpg" class="grid-img" alt="Image 7">
            <h1>Детская одежда<br><span>New arrival</span></h1>
        </figure>
        <figure class="grid-item8">
            <img src="/uploads/index/6.jpg" class="grid-img" alt="Image 8">
            <h1>Спортивная одежда<br><span>от 590 руб.</span></h1>
        </figure>
        <figure class="grid-item9">
            <div class="grid-text-container">
                <div><img src="/uploads/icons/left-arrow.png" class="grid-img" alt="Image 4"></div>
                <h1>Аксессуары</h1>
            </div>
        </figure>
        <figure class="grid-item10">
            <img src="/uploads/index/5.jpg" class="grid-img" alt="Image 10">
        </figure>
    </div>
</main>


<?php
include($_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php');
?>