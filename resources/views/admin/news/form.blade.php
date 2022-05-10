<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @isset($news)
                {{ __('Редагувати новину: ') }} {{ $news->name }}
            @else
                {{ __('Новини: Створення нової новини') }}
            @endisset
        </h2>
    </x-slot>
    <div class="py-2 admin__background_form">
        <div class="container mx-auto px-6">
            <div class="p-6">
                <div class="admin-block__form form-admin">
                    <form class="form-admin__category category-form" method="POST" enctype="multipart/form-data"
                        @isset($news) action="{{ route('news.update', $news) }}" 
								@else
								action="{{ route('news.store') }}" @endisset>
                        <div class="category-form__row">
                            @isset($news)
                                @method('PUT')
                            @endisset
                            @csrf
                            <label for="slug">Код новини:</label>
                            <input type="text" name="slug" @error('slug')  @enderror id=""
                                value="@isset($news) {{ $news->slug }}@else {{ old('slug') }} @endisset">
                        </div>
                        @error('slug')
                            <div class="alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="category-form__row">
                            <label for="title">Заголовок новини:</label>
                            <input type="text" name="title" id="title" @error('title')  @enderror
                                value="@isset($news) {{ $news->title }}@else {{ old('title') }} @endisset">
                        </div>
                        @error('title')
                            <div class="alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="category-form__row">
                            <label for="body">Текст новини:</label>
                            <textarea name="body" id="" rows="10">
@isset($news)
{{ $news->body }}@else{{ old('body') }}
@endisset
</textarea>
                        </div>
                        @error('title')
                            <div class="alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="category-form__row">
                            <label for="image" class="file-label">Зображення новини:</label>
                            <input type="file" class="file" name="image" @error('image')  @enderror
                                value="{{ old('image') }}">
                        </div>
                        @error('image')
                            <div class="alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="category-form__row">
                            @isset($news)
                                <button type="submit">Зберегти зміни</button>
                            @else
                                <button type="submit">Створити</button>
                            @endisset

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
