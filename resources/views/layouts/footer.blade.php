<footer class="footer">
	<div class="footer__container container">
		<div class="footer__body">
			<div class="footer__main">
				<a href="" class="footer__logo">
					<img src="{{Storage::url('logo/logo.jpg')}}" alt="logo">
				</a>
				<div class="footer__text"> All rights reserved.</div>
				<div class="footer__contacts contacts-footer">
					<a href="" class="contacts-footer__item _icon-location"> вулиця Теремнівська, 87-а, Луцьк, Волинська
						область, 43008</a>
					<a href="#" target="_blank" class="contacts-footer__item">Політика конфіденційності</a>
				</div>
			</div>
			<div data-spollers="768,max" class="footer__menu menu-footer">
				<div class="menu-footer__column">
					<button data-spoller type="button"
						class="menu-footer__title footer-title _icon-arrow-down">Навігація:</button>
					<ul class="menu-footer-list">
						<li><a href="{{route('index')}}" class="menu-footer__link">Головна</a></li>
						<li><a href="{{route('about')}}" class="menu-footer__link">Про нас</a></li>
						<li><a href="{{route('menu')}}" class="menu-footer__link">Меню</a></li>
						<li><a href="{{route('news')}}" class="menu-footer__link">Новини</a></li>
					</ul>
				</div>
				<div class="menu-footer__column">
					<button data-spoller type="button" class="menu-footer__title footer-title _icon-arrow-down">Оформити
						замовлення</button>
					<ul class="menu-footer-list">
						<li><a href="tel:+380332716891" class="menu-footer__link _icon-phone">+380 (332) 716891</a></li>
						<li><a href="tel:+380955280214" class="menu-footer__link _icon-phone">+380 (95) 5280214</a></li>
					</ul>
				</div>
				<div class="menu-footer__column">
					<button data-spoller type="button" class="menu-footer__title footer-title _icon-arrow-down">Графік
						роботи:</button>
					<ul class="menu-footer-list">
						<li><span class="_icon-clock">з 11:00 до 22:00</span></li>
					</ul>
				</div>
				<div class="menu-footer__column">
					<button data-spoller type="button" class="menu-footer__title  footer-title _icon-arrow-down">Ми у соц.
						мережах:
					</button>
					<ul class="menu-footer-list">
						<li><a href="#" class="menu-footer__link _icon-facebook">Facebook</a></li>
						<li><a href="#" class="menu-footer__link _icon-instagram">Instagram</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
