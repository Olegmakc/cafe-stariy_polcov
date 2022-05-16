@extends('layouts.master')
@section('title', 'Новини та акції')

@section('content')
    <div class="breadcrumbs__page breadcrumbs">
        <div class="breadcrumbs__container container">
            <ul class="breadcrumbs__list">
                <li class="breadcrumbs__item">
                    <a href="{{ route('index') }}" class="breadcrumbs__link-home">Головна</a>
                </li>
                <li class="breadcrumbs__item">
                    <a class="breadcrumbs__link-here">Новини</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="news__page news">
        <div class="news__container container">
            <h3 class="news__title">Новини</h3>
            <div class="news__body">
                @foreach ($news as $newsItem)
                    <div class="news__item item-news">
                        <a href="{{ route('news.article', $newsItem->slug) }}" class="item-news__image ibg">
                            <img src="{{ Storage::url($newsItem->image) }}" alt="">
                        </a>
                        <div class="item-news__body">
                            <a href="{{ route('news.article', $newsItem->slug) }}"
                                class="item-news__title">{{ Str::of($newsItem->title)->words(10) }}</a>
                            <div class="item-news__text">{{ Str::of($newsItem->body)->words(25) }}</div>
                            <a href="{{ route('news.article', $newsItem->slug) }}" class="item-news__more">Детальніше</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
