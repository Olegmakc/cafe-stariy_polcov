@extends('layouts.master')
@section('title', 'Меню')

@section('content')
    <div class="breadcrumbs__page breadcrumbs">
        <div class="breadcrumbs__container container">
            <ul class="breadcrumbs__list">
                <li class="breadcrumbs__item">
                    <a href="{{ route('index') }}" class="breadcrumbs__link-home">Головна</a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="{{ route('menu') }}" class="breadcrumbs__link-home">Меню</a>
                </li>
                <li class="breadcrumbs__item">
                    <a class="breadcrumbs__link-here">Категорія</a>
                </li>
            </ul>
        </div>
    </div>
    <section class="category__page category">
        <div class="category__container container">
            <div class="category__header header-category">
                <div class="header-category__content content-category">
                    <h2 class="content-category__title">{{ $category->name }}</h2>
                    <select id="filter-product" class="content-category__select _icon-arrow-down" name="select">
                        <option value="">Сортувати за:</option>
                        <option value="price_down">Ціна по спаданню</option>
                        <option value="price_up">Ціна по зростанню</option>
                        <input type="hidden" name="category_code" id="category_code" value="{{ $category->code }}" />
                    </select>
                </div>
            </div>
            <div class="category__body">
                <div id="category-list" class="category__list category-list">
                    @foreach ($products as $product)
                        @include('productCard', compact('product'))
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
