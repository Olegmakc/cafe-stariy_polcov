@forelse ($products as $product)
    <tr>
        <td>id</td>
        <td>{{ $product->id }}</td>
    </tr>
    <tr>
        <td>Зображення страви</td>
        <td><img src="{{ Storage::url($product->photo) }}" alt=""></td>
    </tr>
    <tr>
        <td>Категорія страви</td>
        <td>{{ $product->category->name }}</td>
    </tr>
    <tr>
        <td>Назва страви</td>
        <td>{{ $product->title }}</td>
    </tr>
    <tr>
        <td>Опис страви</td>
        <td>{{ $product->description }}</td>
    </tr>
    <tr>
        <td>Вага страви</td>
        <td>{{ $product->weight }} гр.</td>
    </tr>
    <tr>
        <td>Ціна страви</td>
        <td>{{ $product->price }} грн</td>
    </tr>
    <tr>
        <td>Дії</td>
        <td>
            @if ($product->trashed())
                <div class="form__inline">
                    <form class="product-restore" action="{{ route('products.restore', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn__restore">Відновити
                            продукт</button>
                    </form>
                    <form class="product-force__delete" action="{{ route('products.forceDelete', $product->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn__force_delete">Видалити
                            продукт</button>
                    </form>
                </div>
            @else
                <form class="product-delete" action="{{ route('products.destroy', $product->id) }}" method="POST">
                    <a class="btn btn__succes" href="{{ route('products.show', $product) }}">Переглянути</a>
                    <a class="btn btn__warning" href="{{ route('products.edit', $product) }}">Редагувати</a>

                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn__danger"
                        onclick="return confirm('Are you sure?')">Видалити</button>
                </form>
            @endif
        </td>
    </tr>
    <tr class="separator" colspan="2"></tr>
@empty
    <tr>
        <td colspan="2" align="center">Таких продуктів не має!</td>
    </tr>
@endforelse
<tr>
    <td colspan="2" align="center"><span class="pagination">{!! $products->links() !!}</span></td>
</tr>
