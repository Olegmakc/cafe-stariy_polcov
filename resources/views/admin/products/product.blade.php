<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Продукт: ') }} {{ $product->title }}
        </h2>
    </x-slot>
    <div class="py-1 admin__background">
        <div class="container mx-auto ">
            <div class="product__block product">
                <table class="admin__table admin__table_products">
                    <tr>
                        <th>Поле</th>
                        <th>Значення</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td>Зображення продукта</td>
                            <td><img src="{{ Storage::url($product->photo) }}" alt=""></td>
                        </tr>
                        <tr>
                            <td>Категорія продукта</td>
                            <td>{{ $product->category->name }}</td>
                        </tr>
                        <tr>
                            <td>Опис продукта</td>
                            <td>{{ $product->title }}</td>
                        </tr>
                        <tr>
                            <td>Назва продукта</td>
                            <td>{{ $product->description }}</td>
                        </tr>
                        <tr>
                            <td>Вага страви</td>
                            <td>{{ $product->weight }}</td>
                        </tr>
                        <tr>
                            <td>Ціна страви</td>
                            <td>{{ $product->price }}</td>
                        </tr>
                        <tr>
                            <td>Дії</td>
                            <td>
                                <form class="product-delete" action="{{ route('products.destroy', $product->id) }}"
                                    method="POST">
                                    {{-- <a class="btn btn__succes" type="button" href="{{route('products.show',$product)}}">Переглянути</a> --}}
                                    <a class=" btn btn__warning" type="button"
                                        href="{{ route('products.edit', $product) }}">Редагувати</a>
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn__danger"
                                        onclick="return confirm('Are you sure?')">Видалити</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('products.index') }}" class="product__button btn btn__create">Повернутися назад</a>
            </div>
        </div>
    </div>
</x-app-layout>
