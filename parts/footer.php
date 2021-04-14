<footer>
    <div class="footer-element1">
        <div>
            <h4>Коллекции</h4>
            <a href="/catalog.php?id=1">Женщинам</a><br>
            <a href="/catalog.php?id=2">Мужчинам</a><br>
            <a href="#">Детям</a><br>
            <a href="#">Новинки</a>
        </div>
    </div>
    <div class=" footer-element2">
        <div>
            <h4>Магазин</h4>
            <a href="#">О нас</a><br>
            <a href="#">Доставка</a><br>
            <a href="#">Работай с нами</a><br>
            <a href="#">Контакты</a>
        </div>
    </div>
    <div class="footer-element3">
        <div>
            <h4>Мы в социальных сетях</h4>
            <p>Сайт разработан inordic.ru</p>
            <p>2018 &#169; Все права защищены</p>
        </div>
    </div>
</footer>
<!-- конец wrapper  -->
</div>
<!-- конец wrapper  -->
<?php foreach ($template['page_js'] as $script) : ?>
    <script src="/assets/js/<?= $script; ?>"></script>
<?php endforeach; ?>
</body>

</html>