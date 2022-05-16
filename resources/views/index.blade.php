@extends('layouts.master')
@section('title', 'Головна')

@section('content')
    @if (@session()->has('status'))
        <div class="alert-succes">
            <h3>{{ session()->get('status') }}</h3>
        </div>
    @endif
    @if (@session()->has('successful'))
        <div class="alert-succes">
            <h3>{{ session()->get('successful') }}</h3>
        </div>{{ session()->forget('successful') }}
    @endif
    @if (@session()->has('warning'))
        <div class="alert-warning">
            <h3>{{ session()->get('warning') }}</h3>
        </div>{{ session()->forget('warning') }}
    @endif
    <div class="page__main-slider slider-main">
        <div class="slider-main__container container">
            <div class="slider-main__body">
                <div class="slider-main__content content-slider">
                    <div class="content-slider__body">
                        <h1 class="content-slider__title">РЕСТОРАН СТАРИЙ ПОЛКОВНИК ГОСТИННО ЗАПРОШУЄ ВАС ВІДВІДАТИ
                            СМАЧНІ СТРАВИ УКРАЇНСЬКОЇ ТА ЄВРОПЕЙСЬКОЇ КУХНІ ВІД ШЕФ-ПОВАРА ЗАКЛАДУ</h1>
                        <div class="content-slider__text">Гостинний ресторан Старий полковник нікого не залишить
                            байдужим! Смачна авторська кухня, першокласне обслуговування, гостинна атмосфера.
                        </div>
                        <a href="{{ route('about') }}" class="content-slider__button _btn">Дізнатись більше</a>
                    </div>
                </div>
                <div class="slider-main__slider main-slider">
                    <div class="main-slider__slider swiper-container">
                        <div class="main-slider__swapper swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="main-slider__image ibg">
                                    <img src="img/main_slider/01.jpg" alt="first-slide">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="main-slider__image ibg">
                                    <img src="img/main_slider/02.jpg" alt="first-slide">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="main-slider__image ibg">
                                    <img src="img/main_slider/03.jpg" alt="first-slide">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="main-slider__image ibg">
                                    <img src="img/main_slider/04.jpg" alt="first-slide">
                                </div>
                            </div>
                        </div>
                        <div class="main-slider__controlls">
                            <div class="main-slider__arrow swiper-button-prev"></div>
                            <div class="main-slider__arrow swiper-button-next"></div>
                            <div class="main-slider__pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="page__products-slider products-slider">
        <div class="products-slider__container container">
            @foreach ($categories as $category)
                @if ($category->products->count() > 0)
                    <div class="products-slider__slider slider-products">
                        <div class="slider-products__container swiper-container">
                            <div class="products-slider__header">
                                <div class="products-slider__title">{{ $category->name }}</div>
                                <div class="products-slider__controls controls-slider">
                                    <button type="button"
                                        class="slider__arrow_prev slider-arow slider-arow_prev _icon-arrow-down"></button>
                                    <div class="products-slider__dotts slider__dotts"></div>
                                    <button type=" button"
                                        class="slider__arrow_next slider-arow slider-arow_next _icon-arrow-down"></button>

                                    <a href="{{ route('menu.category', $category->code) }}"
                                        class="products-slider__more"><span class="products-slider__text">Дивитись
                                            меню</span>
                                        <span class="products-slider__text-sm">Ще</span>
                                    </a>
                                </div>
                            </div>
                            <div class="slider-products__wrapper swiper-wrapper">
                                @foreach ($category->products as $product)
                                    <div class="slider-products__slide swiper-slide">
                                        @include('productCard', compact('product'))
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endsection
