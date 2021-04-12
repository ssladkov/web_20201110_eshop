<div class="footer">
	<div class="left-block" id="contacts">
			<div class="inside-footer">
                <h2 >Коллекции</h2>
                <p><a href="catalog.php?id=2">Женщинам</a></p>
                <p><a href="catalog.php?id=1">Мужчинам</a></p>
                <p><a href="catalog.php">Детям</a></p>
                <p><a href="catalog.php?id=3">Новинки</a></p>
            </div>
		</div>
		<div class="center-block">
            <div class="inside-footer">
                <h2 >Магазин</h2>
                <p>О нас</p>
                <p>Доставка</p>
                <p>Работай с нами</p>
                <p>Контакты</p>
            </div>
		</div>
		
		
		<div class="right-block">
            <div class="inside-footer">
                <h2 >Мы в социальных сетях</h2>	
                <p>Сайт разработан в inordic.ru</p>
                <p>2018 © Все права защищены</p>
                <div class="social-icons">
                <a href="https://twitter.com" target="_blank">
                    <img src="/uploads/icons/twitter.jpg" alt="TW logo" title="TW logo"></a>
                <a href="https:/facebook.com" target="_blank">
                    <img src="/uploads/icons/fb.jpg" alt="FB logo" title="FB logo"></a>
                <a href="https://instagram.com" target="_blank">
                    <img src="/uploads/icons/insta.jpg" alt="instagram logo" title="instagram logo"></a>
             </div>
            </div>    
            
	    </div>
	</div>
<?php foreach($template['page_js'] as $script) : ?>
    <script src="/assets/js/<?=$script;?>"></script>
<?php endforeach; ?>
</body>
</html>