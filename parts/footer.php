<footer>
    <div class="footer-element1">
        <div>
            <h4>Коллекции</h4>
            <a>Женщинам</a><br>
            <a>Мужчинам</a><br>
            <a>Детям</a><br>
            <a>Новинки</a>
        </div>
    </div>
    <div class="footer-element2">
        <div>
            <h4>Магазин</h4>
            <a>О нас</a><br>
            <a>Доставка</a><br>
            <a>Работай с нами</a><br>
            <a>Контакты</a>
        </div>
    </div>
    <div class="footer-element3">
        <div>
            <h4>Мы в социальных сетях</h4>
            <a>Сайт разработан inordic.ru</a><br>
            <a>Все права защищены</a>
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