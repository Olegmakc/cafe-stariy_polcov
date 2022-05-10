@extends('layouts.master')
@section('title','Контакти')

@section('content')
	<div class="breadcrumbs__page breadcrumbs">
		<div class="breadcrumbs__container container">
			<ul class="breadcrumbs__list">
				<li class="breadcrumbs__item">
					<a href="{{route("index")}}" class="breadcrumbs__link-home">Головна</a>
				</li>
				<li class="breadcrumbs__item">
					<a class="breadcrumbs__link-here">Контакти</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="page__contacts contacts-page">
		<div class="contacts-page__container container">
			<div class="contacts-page__row">
				<div class="contacts-page__column">
					<div class="contacts-page__title">Контактна інформація</div>
					<div class="contacts-page__address"><span>Адреса:</span> м. Луцьк, вулиця Теремнівська, 87-а
					</div>
					<div class="contacts-page__phones phones-contact">
						<div class="phones-contact__title">Tелефони:</div>
						<ul class="phones-contact__list">
							<li>
								<a href="tel:+380332716891" class="phones-contact__link _icon-phone">+380 (332) 716891</a>
							</li>
							<li>
								<a href="tel:+380955280214" class="phones-contact__link _icon-phone">+380 (95) 5280214</a>
							</li>
						</ul>
					</div>
					<ul class="contacts-page__social social-contact">
						<li><a href="#" class="social-contact__link _icon-facebook">Facebook</a></li>
						<li><a href="#" class="social-contact__link _icon-instagram">Instagram</a></li>
					</ul>
				</div>
				<div class="contacts-page__column">
					<form action="{{route('store')}}" method="POST" class="contacts-page__form form-contact">
						@csrf
						<div class="form-contact__title">Зворотній зв'язок</div>
						<div class="form-contact__row">
							<div class="form-contact__column">
								<input type="text" class="form-contact__input @error('name')@enderror" name="name" placeholder="Ім`я" value="{{old('name')}}">
								@error('name')
									<div class="alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-contact__column">
								<input type="text" class="form-contact__input @error('email')@enderror" name="email"
									placeholder="Електронна пошта" value="{{old('email')}}">
									@error('email')
										<div class="alert-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>
						<div class="form-contact__row">
							<div class="form-contact__column">
								<input type="text" class="form-contact__input @error('subject')@enderror" value="{{old('subject')}}" name="subject" placeholder="Тема">
								@error('subject')
										<div class="alert-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>
						<div class="form-contact__row">
							<div class="form-contact__column">
								<textarea class="form-contact__text @error('message')@enderror" name="message" id=""
									placeholder="Повідомлення" rows="5"></textarea>
									@error('message')
										<div class="alert-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>
						<div class="form-contact__row">
							<div class="form-contact__column">
								<button type="submit" class="form-contact__btn _icon-send" name="
									contact-button">Відправити</button>
							</div>
						</div>
					</form>
			
				</div>
			</div>
		</div>
	</div>	
@endsection