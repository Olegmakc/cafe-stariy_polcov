<article class="slider-products__card card-product">
    <a class="card-product__image k">
        <div class="card-product__inner ibg">
            <img src="{{ Storage::url($product->photo) }}" alt="{{ $product->title }}">
        </div>
    </a>
    <div class="card-product__body">
        <div class="card-product__title">
            <a class="card-product__title-link">{{ $product->title }}</a>
        </div>
        <div class="card-product__text">
            <span class="card-product__weight">{{ $product->weight . ' гр.' }}</span>
            @if (is_null($product->description))
                {{ $product->description }}
            @else
                - {{ $product->description }}
            @endif

        </div>
        <div class="card-product__footer product-footer">
            <form action="{{ route('basket.add', $product) }}" method="POST">
                @csrf
                <button type="submit" data-id="{{ $product->id }}" class="product-footer__button _icon-cart"><span>В
                        кошик</span></button>
            </form>
            <div class="product-footer__price">{{ $product->price }} грн</div>
        </div>
    </div>
</article>
