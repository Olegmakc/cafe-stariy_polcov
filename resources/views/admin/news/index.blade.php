<x-app-layout>
    <div class="py-2 admin__background">
        <div class="container mx-auto  px-6">
            <div class="shadow-sm sm:rounded-lg bg-greey-200">
                <div class="category__block">
                    <x-slot name="header">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Всі новини:') }}
                        </h2>
                    </x-slot>
                    @if (@session()->has('news-success'))
                        <div class="message message_success" role="alert">
                            {{ session()->get('news-success') }}
                        </div>
                    @endif
                    <a href="{{ route('news.create') }}" class="news__btn btn btn__create">Додати новину</a>
                    <div class="search-block__body">
                        <input type="text" class="search-block__input" placeholder="Заголовок новини ..."
                            name="news-search" id='news-search'>
                        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                    </div>
                    <table class="admin__table admin__table_news">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Зображення</th>
                                <th>Заголовок </th>
                                <th>Текст</th>
                                <th>Дії з записами</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('admin.news.searchData')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
