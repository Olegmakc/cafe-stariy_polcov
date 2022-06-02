@extends('layouts.master')
@section('title',"Новини та акції: $newsItem->title") 

@section('content')
	<div class="breadcrumbs__page breadcrumbs">
		<div class="breadcrumbs__container container">
			<ul class="breadcrumbs__list">
				<li class="breadcrumbs__item">
					<a href="{{route('index')}}" class="breadcrumbs__link-home">Головна</a>
				</li>
				<li class="breadcrumbs__item">
					<a href="{{route('news')}}" class="breadcrumbs__link-home">Новини</a>
				</li>
				<li class="breadcrumbs__item">
					<a class="breadcrumbs__link-here">{{ Str::of($newsItem->title)->words(4);}}</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="page__news_article article-news">
		<div class="article-news__container container">
			<div class="article-news__content content-news">
				<div class="content-news__columns">
					<div class="content-news__image ibg">
						<img src="{{Storage::url($newsItem->image)}}" alt="">
					</div>
				</div>
				<div class="content-news__columns">
					<div class="content-news__body body-content-news">
						<div class="body-content-news__title">{{$newsItem->title}}</div>
						<div class="body-content-news__data">{{$newsItem->created_at->format('d/m/Y')}}</div>
						<div class="body-content-news__text">
							<p>{{$newsItem->body}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="item-news__slider slider-item-news">
		<div class="slider-item-news__container container">
			<div class="slider-item-news__slider slider-news">
				<div class="slider-news__container swiper-container">
					<div class="slider-news__header">
						<h3 class="slider-news__title">Дивітся також</h3>
						<div class="slider-news__controls controls-slider">
							<button type="button"
								class="slider__arrow_prev slider-arow slider-arow_prev _icon-arrow-down"></button>
							<div class="slider-news__dotts slider__dotts"></div>
							<button type=" button"
								class="slider__arrow_next slider-arow slider-arow_next _icon-arrow-down"></button>
						</div>
					</div>
					<div class="slider-news__wrapper swiper-wrapper">
						@foreach ($news as $newsArticle)
						<div class="slider-news__slide swiper-slide">
							<div class="news__item item-news">
								<a href="{{route('news.article',$newsArticle->slug)}}" class="item-news__image ibg">
									<img src="{{Storage::url($newsArticle->image)}}" alt="">
								</a>
								<div class="item-news__body">
									<a href="{{route('news.article',$newsArticle->slug)}}" class="item-news__title">{{$newsArticle->title}}</a>
									<div class="item-news__text">{{Str::of($newsArticle->body)->words(25);}}</div>
									<a href="{{route('news.article',$newsArticle->slug)}}" class="item-news__more">Детальніше</a>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection