@forelse ($categories as $category)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td><img src="{{ Storage::url($category->image) }}" alt=""></td>
        <td>{{ $category->code }}</td>
        <td>{{ $category->name }}</td>
        <td>
            @if ($category->trashed())
                <div class="form__inline">
                    <form class="product-restore" action="{{ route('category.restore', $category->id) }}"
                        method="POST">
                        @csrf
                        <button type="submit" class="btn btn__restore">Відновити
                            категорію</button>
                    </form>
                    <form class="product-force__delete" action="{{ route('category.forceDelete', $category->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn__force_delete">Видалити
                            категорію</button>
                    </form>
                </div>
            @else
                <form class="category-delete" action=" {{ route('category.destroy', $category->id) }}" method="POST">
                    <a class="btn btn__succes" type="button"
                        href="{{ route('category.show', $category) }}">Переглянути</a>
                    <a class="btn btn__warning" type="button"
                        href="{{ route('category.edit', $category) }}">Редагувати</a>
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn__danger"
                        onclick="return confirm('Are you sure?')">Видалити</button>
                </form>
            @endif
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" align="center">Не має видалених записів!!!</td>
    </tr>
@endforelse
<tr>
    <td colspan="5" align="center"><span class="news__pagination">{!! $categories->links() !!}</span></td>
</tr>
