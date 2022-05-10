@extends('layouts.master')
@section('title','Про нас')
@section('content')
	<div class="breadcrumbs__page breadcrumbs">
		<div class="breadcrumbs__container container">
			<ul class="breadcrumbs__list">
				<li class="breadcrumbs__item">
					<a href="{{route('index')}}" class="breadcrumbs__link-home">Головна</a>
				</li>
				<li class="breadcrumbs__item">
					<a class="breadcrumbs__link-here">Про нас</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="page__about-us about-us">
		<div class="about-us__container container">
			<div class="about-us__content content-about-us">
				<section class="content-about-us__item about-us">
					<h2 class="about-us__title title-about">МЕНЮ</h2>
					<div class="about-us__text">Смачні страви в авторському виконанні шеф-повара закладу розкриють
						перед Вами різноманіття смаків української та європейської кухні. Найголовніші складові кухні
						закладу – свіжість, екологічність, авторське виконання та відданість традиціям. Звичайно ж,
						бенкет
						чи весілля в Старому полковнику це в першу чергу кухня, яка не одноразово отримувала найкращі
						відгуки та хороші рекомендації від гостей закладу</div>
				</section>
				<section class="content-about-us__item about-us">
					<h2 class="about-us__title title-about">ОБСЛУГОВУВАННЯ</h2>
					<div class="about-us__text">
						<p>Ресторан Старий полковник підтримує високий рівень обслуговування, що робить даний заклад
							ідеальним місцем, як для ділових зустрічей, шумних вечірок, так і для сімейних свят.</p>
						<p>Офіціанти закладу допоможуть зорієнтуватися серед різноманіття страв та запропонують
							оцінити
							страви, які зможуть задовільнити смаки навіть найвитонченіших гурманів.</p>
					</div>
				</section>
				<section class="content-about-us__item about-us">
					<h2 class="about-us__title title-about">АТМОСФЕРА</h2>
					<div class="about-us__text">
						Сучасний затишний дизайн інтер'єру, в якому переважає елегантна простота, виконаний в
						класичному
						стилі. У закладі правильно підібране освітлення та музичний супровід – все це створює
						незвичайну
						атмосферу, у яку Ви схочете повернутися знову.
					</div>
				</section>
				<section class="content-about-us__item about-us">
					<h2 class="about-us__title title-about">ЗАЛИ РЕСТОРАНУ:</h2>
					<ul class="about-us__list">
						<li>Зал для ювілеїв, весіль, бенкетів на 200 осіб</li>
						<li>Бенкетки на 30, 20, 16 осіб</li>
						<li>Мангал бар</li>
						<li>Літня прощадка</li>
					</ul>
				</section>
				<section class="content-about-us__item about-us">
					<h2 class="about-us__title title-about">ШУКАЄТЕ ІДЕАЛЬНЕ МІСЦЕ ДЛЯ ПРОВЕДЕННЯ ВЕСІЛЛЯ?</h2>
					<div class="about-us__text">
						<p>Ресторан Старий полковник саме те, затишне місце, яке Ви шукаєте, для проведення
							незабутнього,
							повного приємних вражень, весілля. У ресторані представлено широкий асортимент холодних
							закусок
							і салатів, гарячих закусок, гарячих м'ясних, рибних, овочевих страв і гарнірів. Разом з
							адміністратором закладу Ви зможете правильно розрахувати кількість страв, закусок та
							напоїв,
							щоб
							Ваші гості залишились максимально задоволені. Правильно складене весільне меню – це
							запорука
							успіху Вашого свята!</p>
					</div>
				</section>
				<section class="content-about-us__item about-us">
					<h2 class="about-us__title title-about">ДО ВАШИХ ПОСЛУГ:</h2>
					<ul class="about-us__list">
						<li>Зал для ювілеїв, весіль, бенкетів на 200 осіб</li>
						<li>Достатньо місця для танців та проведення розваг</li>
						<li>Першокласне обслуговування</li>
						<li>Музичний супровід, підібраний враховуючи Ваші уподобання</li>
						<li>Меню, що складається зі смачних страв української та європейської кухні</li>
						<li>Накриття фуршету</li>
						<li>Відпочинкова зала</li>
						<li>Парковка біля ресторану з достатньою кількістю паркомісць</li>
					</ul>
				</section>
				<section class="content-about-us__item about-us">
					<h2 class="about-us__title title-about">ПЛАНУЄТЕ ЗУСТРІЧ З ДРУЗЯМИ, РІДНИМИ ЧИ КОЛЕГАМИ?</h2>
					<div class="about-us__text">
						<p>Що стосується міні-бенкетів, для них чудово підійдуть бенкетки, які вміщають 16, 20, 30
							гостей.
							Спокійна, комфортна обстановка ресторану підійде для різноманітних заходів - романтична
							вечеря,
							зустріч з близькими, ювілеї, дитячий день народження, корпоративний захід, діловий обід,
							чи
							бізнес-ланч.</p>
					</div>
				</section>
				<section class="content-about-us__item about-us">
					<h2 class="about-us__title title-about">ОРЕНДА КОНФЕРЕНЦ-ЗАЛУ</h2>
					<div class="about-us__text">
						<p>Великий зал чи окрема бенкетка до уваги організаторів конференцій, тренінгів, музичних
							вечорів,
							презентацій, семінарів, ділових чи культурних заходів. У ресторані Старий полковник
							створені
							всі
							умови для проведення офіційної частини та подальшого неформального спілкування за обідом
							чи
							вечерею. Поряд з рестораном розміщені готелі, де організатори заходів при потребі можуть
							розмістити
							гостей.</p>
					</div>
				</section>
				<section class="content-about-us__item about-us">
					<h2 class="about-us__title title-about">МАНГАЛ БАР</h2>
					<div class="about-us__text">
						<p>Двохповерховий мангал бар на території закладу та велика літня тераса запрошують
							скуштувати
							нове
							мангал меню. В теплу пору року набирають популярності страви, приготовані на мангалі. Ви
							зможете
							побачити, як готується Ваша страва на відкритому вогні та насолодитися нею на свіжому
							повітрі.
						</p>
						<p>Хочете гарно провести час з близькими людьми та незабутньо відсвяткувати важливу подію?
							Бронюйте
							столик, бенкетку або замовляйте великий зал у ресторані Старий полковник.</p>
					</div>
				</section>
			</div>
			<section class="about-us__galery galery-about">
				<h3 class="galery-about__title title-about">Галерея</h3>
				<div id="lightgallery" class="lightgallery__items">
					<a class="lightgallery__item" href="{{Storage::url("galery/01.jpg")}}">
						<div class="lightgallery__inner ibg lightgallery__item_big">
							<img alt="Картинка тераси" src="{{Storage::url("galery/01.jpg")}}" />
						</div>
					</a>
					<a class="lightgallery__item" href="{{Storage::url("galery/02.jpg")}}">
						<div class="lightgallery__inner ibg">
							<img alt="Картинка" src="{{Storage::url("galery/02.jpg")}}" />
						</div>
					</a>
					<a class="lightgallery__item" href="{{Storage::url("galery/03.jpg")}}">
						<div class="lightgallery__inner ibg">
							<img alt="Картинка" src="{{Storage::url("galery/03.jpg")}}" />
						</div>
					</a>
					<a class="lightgallery__item" href="{{Storage::url("galery/04.jpg")}}">
						<div class="lightgallery__inner ibg">
							<img alt="Картинка" src="{{Storage::url("galery/04.jpg")}}" />
						</div>
					</a>
					<a class="lightgallery__item" href="{{Storage::url("galery/05.jpg")}}">
						<div class="lightgallery__inner ibg">
							<img alt="Картинка" src="{{Storage::url("galery/05.jpg")}}" />
						</div>
					</a>
					<a class="lightgallery__item" href="{{Storage::url("galery/06.jpg")}}">
						<div class="lightgallery__inner ibg">
							<img alt="Картинка" src="{{Storage::url("galery/06.jpg")}}" />
						</div>
					</a>
					<a class="lightgallery__item" href="{{Storage::url("galery/07.jpg")}}">
						<div class="lightgallery__inner ibg">
							<img alt="Картинка" src="{{Storage::url("galery/07.jpg")}}" />
						</div>
					</a>
					<a class="lightgallery__item" href="{{Storage::url("galery/08.jpg")}}">
						<div class="lightgallery__inner ibg">
							<img alt="Картинка" src="{{Storage::url("galery/08.jpg")}}" />
						</div>
					</a>
					<a class="lightgallery__item" href="{{Storage::url("galery/09.jpg")}}">
						<div class="lightgallery__inner ibg">
							<img alt="Картинка" src="{{Storage::url("galery/09.jpg")}}" />
						</div>
					</a>
					<a class="lightgallery__item" href="{{Storage::url("galery/10.jpg")}}">
						<div class="lightgallery__inner ibg">
							<img alt="Картинка" src="{{Storage::url("galery/10.jpg")}}" />
						</div>
					</a>
					<a class="lightgallery__item" href="{{Storage::url("galery/11.jpg")}}">
						<div class="lightgallery__inner ibg">
							<img alt="Картинка" src="{{Storage::url("galery/11.jpg")}}" />
						</div>
					</a>
					<a class="lightgallery__item" href="{{Storage::url("galery/12.jpg")}}">
						<div class="lightgallery__inner ibg">
							<img alt="Картинка" src="{{Storage::url("galery/12.jpg")}}" />
						</div>
					</a>
					<a class="lightgallery__item" href="{{Storage::url("galery/13.jpg")}}">
						<div class="lightgallery__inner ibg">
							<img alt="Картинка" src="{{Storage::url("galery/13.jpg")}}" />
						</div>
					</a>
					<a class="lightgallery__item" href="{{Storage::url("galery/14.jpg")}}">
						<div class="lightgallery__inner ibg">
							<img alt="Картинка" src="{{Storage::url("galery/14.jpg")}}" />
						</div>
					</a>
				</div>
			</section>
		</div>

	</div>

@endsection