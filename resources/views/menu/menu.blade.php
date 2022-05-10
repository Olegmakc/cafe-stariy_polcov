
@extends('layouts.master')
@section('title','Меню')

@section('content')
	<div class="breadcrumbs__page breadcrumbs">
		<div class="breadcrumbs__container container">
			<ul class="breadcrumbs__list">
				<li class="breadcrumbs__item">
					<a href="{{route('index')}}" class="breadcrumbs__link-home">Головна</a>
				</li>
				<li class="breadcrumbs__item">
					<a class="breadcrumbs__link-here">Меню</a>
				</li>
			</ul>
		</div>
	</div>
	<section class="category__page category">
		<div class="category__container container">
			<div class="category__header">
				<h2 class="category__title">Меню</h2>
			</div>
			<div class="category__body">
				<div class="category__items">
					@foreach ($categories as $category)
					<a href="{{route('menu-Category',[$category->code])}}" class="category__item item-category">
						<div class="item-category__image ">
							<div class="item-category__image-inner ibg-contain ">
								<img src="{{Storage::url($category->image)}}" alt="">
							</div>
						</div>
						<div class="item-category__title">{{$category->name}}</div>
					</a>
					@endforeach
				</div>
			</div>
	</section>
@endsection