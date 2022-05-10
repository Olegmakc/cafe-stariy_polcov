<x-app-layout>
    <div class="py-2 admin__background">
        <div class="container mx-auto  px-6">
            <div class="shadow-sm sm:rounded-lg bg-greey-200">
                @if (@session()->has('category-success'))
                    <div class="alert alert-primary" role="alert">
                        {{ session()->get('category-success') }}
                    </div>
                @endif
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Всі замовлення:') }}
                    </h2>
                </x-slot>
                <div class="products__search search-block">
                    <div class="search-block__column">
                        <input type="text" class="search-block__input" placeholder="Введіть назву ..."
                            name="search_order" id='search_order'>
                        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                    </div>
                    <div class="search-block__column">
                        <select id="order-type__select" class="search-block__select" name="select">
                            <option value="">Тип оплати:</option>
                            <option value="cash">Готівка</option>
                            <option value="credit">Кредитна карта</option>
                        </select>

                        <select id="order-date__select" class="search-block__select" name="select">
                            <option value="">Сортування за датою:</option>
                            <option value="asc">Дата створення (old)</option>
                            <option value="desc">Дата створення (new)</option>
                        </select>
                    </div>
                </div>
                <table class="admin__table admin__table_products">
                    <thead>
                        <tr>
                            <th>Поле</th>
                            <th>Значення </th>
                        </tr>
                    </thead>
                    <tbody>
                        @include('admin.orders.searchData')
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
