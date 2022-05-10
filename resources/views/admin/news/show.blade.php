<x-app-layout>
    <div class="py-2 admin__background">
        <div class="container mx-auto  px-6">
            <div class="shadow-sm sm:rounded-lg ">
                <div class="category__block">
                    <x-slot name="header">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Новина:') }} {{ $news->title }}
                        </h2>
                    </x-slot>

                    <div class="admin__row">
                        <div class="admin__column">
                            <h4 class="admin__title">Зображення новини</h4>
                            <img src="{{ Storage::url($news->image) }}" alt="">
                        </div>
                        <div class="admin__column">
                            <h4 class="admin__title">Властивості</h4>
                            <table class="admin__table admin__table_news">
                                <tr>
                                    <th>Поле</th>
                                    <th>Значення</th>
                                </tr>
                                <tr>
                                    <td>№</td>
                                    <td>{{ $news->id }}</td>
                                </tr>
                                <tr>
                                    <td>Код</td>
                                    <td><a href="{{ url('category', $news->id) }}">{{ $news->slug }}</a></td>
                                </tr>
                                <tr>
                                    <td>Заголовок</td>
                                    <td>{{ $news->title }}</td>
                                </tr>
                                <tr>
                                    <td>Текст</td>
                                    <td>{{ $news->body }}</td>
                                </tr>

                                <tr>
                                    <td>Дії з записами</td>
                                    <td>
                                        <form class="category-delete" action="
                                            {{ route('news.destroy', $news->id) }}" method="POST">
                                            <a class="btn btn__warning" type="button"
                                                href="{{ route('news.edit', $news) }}">Редагувати</a>
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" onclick="return confirm('Are you sure?')"
                                                class="btn btn__danger">Видалити</button>
                                        </form>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <a href="{{ route('news.index') }}" class="category__btn btn btn__create">Повернутись до
                        новин</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
