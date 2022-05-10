@extends('layouts.master')
@section('title', 'Корзина')
@section('content')
    <div class="bascket__block bascket">
        <div class="bascket__container container">
            <div class="bascket__content">
                @if (session()->has('success'))
                    <div class="bascket__alert bascket-success">{{ session()->get('success') }} </div>
                @endif
                @if (session()->has('warning'))
                    <div class="bascket__alert bascket-warning">{{ session()->get('warning') }}</div>
                @endif
                <div class="bascket__title">Ваше замовлення:</div>
                <div class="bascket__items">
                    @foreach ($order->products as $product)
                        <div class="popup__item item-popup">
                            <div class="item-popup__photo ibg">
                                <img src="{{ Storage::url($product->photo) }}" alt="">
                            </div>
                            <div class="item-popup__body">
                                <a href="#" class="item-popup__title">{{ $product->title }}</a>
                                <div class="item-popup__quantity quantity-item-popup">
                                    <form action="{{ route('basketRemove', $product) }}" method="POST">
                                        <button type="submit"
                                            class="quantity-item-popup__minus _icon-circle-minus"></button>
                                        @csrf
                                    </form>
                                    <form class="quantity-item-popup__input">
                                        <input type="text" class="product__quantity" value="{{ $product->count }}">
                                    </form>
                                    <form action="{{ route('basketAdd', $product) }}" method="POST" id="add-to__cart">
                                        <button type="submit" class="quantity-item-popup__add _icon-circle-plus"></button>
                                        @csrf
                                    </form>
                                </div>
                                <div class="item-popup__price">{{ $product->price * $product->count }} грн.</div>
                                <form action="{{ route('basketRemoveAll', $product) }}" method="POST">
                                    <button type="submit" class="item-popup__clear _icon-circle-xmark"></button>
                                    @csrf
                                </form>
                                <span class=""></span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="{{ route('menu') }}">Повернутись до меню</a>
                <div class="bascket__footer">

                    <div class="bascket__sum"><span>Сумма:</span> {{ $order->getFullSum() }} грн</div>
                    <a href="#popup" class="bascket__btn popup-link">Оформити замовлення</a>
                </div>
                @include('basket.cartPopup', compact('order'))
            </div>
        </div>
    </div>
    </div>
@endsection
