@forelse ($news as $newsItem)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td><img src="{{ Storage::url($newsItem->image) }}" alt=""></td>
        <td>{{ $newsItem->title }}</td>
        <td>{{ $newsItem->body }}</td>
        <td>
            <form class="category-delete" action="{{ route('news.destroy', $newsItem->id) }}" method="POST">
                <a class="btn btn__succes" type="button" href="{{ route('news.show', $newsItem) }}">Переглянути</a>
                <a class="btn btn__warning" type="button" href="{{ route('news.edit', $newsItem) }}">Редагувати</a>
                @method('DELETE')
                @csrf
                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn__danger">Видалити</button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" align="center">Записів не знайдено!</td>
    </tr>
@endforelse
<tr>
    <td colspan="5" align="center"><span class="news__pagination">{!! $news->links() !!}</span></td>
</tr>
