<x-app-layout>
    <div class="py-2 admin__background">
        <div class="container mx-auto  px-6">
            <div class="shadow-sm sm:rounded-lg ">
                <div class="category__block">
                    <x-slot name="header">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Категорія') }} {{ $category->name }}
                        </h2>
                    </x-slot>
                    <table class="admin__table admin__table_categories">
                        <tr>
                            <th>№</th>
                            <th>Зображення</th>
                            <th>Код категорії</th>
                            <th>Назва категорії</th>
                            <th>Дії з записами</th>
                        </tr>
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td><img src="{{ Storage::url($category->image) }}" alt=""></td>
                            <td><a href="{{ url('category', $category->id) }}">{{ $category->code }}</a></td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <form class="category-delete" action="
                                    {{ route('category.destroy', $category->id) }}" method="POST">
                                    <a class="btn btn__warning" type="button"
                                        href="{{ route('category.edit', $category) }}">Редагувати</a>
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="btn btn__danger">Видалити</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                    <a href="{{ route('category.index') }}" class="category__btn btn btn__succes">Повернути на
                        головну</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
