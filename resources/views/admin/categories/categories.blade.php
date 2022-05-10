<x-app-layout>
    <div class="py-2 admin__background">
        <div class="container mx-auto  px-6">
            <div class="shadow-sm sm:rounded-lg bg-greey-200">
                <div class="category__block">
                    @if (@session()->has('category-success'))
                        <div class="message message_success" role="alert">
                            {{ session()->get('category-success') }}
                        </div>
                    @endif
                    <x-slot name="header">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Всі категорії:') }}
                        </h2>
                    </x-slot>

                    @if (!Request::has('archive'))
                        <a href="{{ route('category.create') }}" class="category__btn btn btn__create">Додати нову
                            категорію</a>
                        <a class="product__button btn btn__restore" href="{{ url()->current() . '?archive' }}">Видалені
                            категорії</a>
                    @else
                        <a class="product__button btn btn__create" href="{{ url()->previous() }}">Назад</a>
                    @endif

                    <div class="search-block__body">
                        <input type="text" class="search-block__input" placeholder="Введіть назву страви ..."
                            name="category_search" id='category_search'>
                        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                    </div>

                    <table class="admin__table admin__table_categories">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Зображення</th>
                                <th>Код </th>
                                <th>Назва категорії</th>
                                <th>Дії з записами</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('admin.categories.searchData')
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
