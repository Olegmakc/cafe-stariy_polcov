<x-app-layout>
    <div class="py-2 admin__background">
        <div class="container mx-auto ">
            <div class="product__block product ">
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight bg-gray-200">
                        {{ __('Всього продуктів:') }}
                    </h2>
                </x-slot>
                @if (@session()->has('success'))
                    <div class="message message_success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (!Request::has('archive'))
                    <a href="{{ route('products.create') }}" class="product__button btn btn__create">Додати новий
                        продукт</a>

                    <a class="product__button btn btn__restore" href="{{ url()->current() . '?archive' }}">Видалені
                        продукти</a>
                @else
                    <a class="product__button btn btn__create" href="{{ url()->previous() }}">Назад</a>
                @endif
                <div class="products__search search-block">
                    <div class="search-block__column">
                        <input type="text" class="search-block__input" placeholder="Введіть назву страви ..."
                            name="search" id='search'>
                        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                    </div>
                    <div class="search-block__column">
                        <select id="product-category__select" class="search-block__select" name="select">
                            <option value="">Сортувати за категорією:</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <table class="admin__table admin__table_products">
                    <thead>
                        <tr>
                            <th>Поле</th>
                            <th>Значення</th>
                        </tr>
                    </thead>
                    <tbody>
                        @include('admin.products.searchData')
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
