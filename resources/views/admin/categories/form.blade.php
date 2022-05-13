<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @isset($category)
                {{ __('Редагувати категорію: ') }} {{ $category->name }}
            @else
                {{ __('Категорія: Створення нової категорії') }}
            @endisset
        </h2>
    </x-slot>
    <div class="py-2 admin__background_form">
        <div class="container mx-auto px-6">
            <div class="p-6">
                <div class="admin-block__form form-admin">
                    <form class="form-admin__category category-form" method="POST" enctype="multipart/form-data"
                        @isset($category) action="{{ route('category.update', $category) }}" 
						@else
							action="{{ route('category.store') }}" @endisset>
                        <div class="category-form__row">
                            @isset($category)
                                @method('PUT')
                            @endisset
                            @csrf
                            <label for="code">Код категорії:</label>
                            <input type="text" name="code" @error('code')  @enderror id=""
                                value="@isset($category) {{ $category->code }}@else {{ old('code') }} @endisset">
                        </div>
                        @include('admin.error.error', ['fieldName' => 'code'])
                        <div class="category-form__row">
                            <label for="name">Назва категорії:</label>
                            <input type="text" name="name" id="name" @error('name')  @enderror
                                value="@isset($category) {{ $category->name }}@else {{ old('name') }} @endisset">
                        </div>
                        @include('admin.error.error', ['fieldName' => 'name'])
                        <div class="category-form__row">
                            <label for="image" class="file-label">Зображення категорії:</label>
                            <input type="file" class="file" name="image" @error('image')  @enderror
                                value="{{ old('image') }}">
                        </div>
                        @include('admin.error.error', ['fieldName' => 'image'])
                        <div class="category-form__row">
                            @isset($category)
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
