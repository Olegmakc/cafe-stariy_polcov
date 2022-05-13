<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Редагувати користувача: ') }} {{ $user->name }}
        </h2>
    </x-slot>
    <div class="py-2 admin__background_form">
        <div class="container mx-auto px-6">
            <div class="p-6">
                <div class="admin-block__form form-admin">

                    <form class="form-admin__category category-form" method="POST" enctype="multipart/form-data"
                        action="{{ route('users.update', $user) }}">
                        @method('PUT')
                        @csrf
                        <div class="category-form__row">
                            <label for="code">Ім'я</label>
                            <input type="text" name="name" @error('name')  @enderror id="" value="{{ $user->name }}">
                        </div>
                        @include('admin.error.error', ['fieldName' => 'name'])
                        <div class="category-form__row">
                            <label for="name">Email</label>
                            <input type="text" name="email" id="email" @error('email')  @enderror
                                value="{{ $user->email }}">
                        </div>
                        @include('admin.error.error', ['fieldName' => 'email'])
                        <div class="category-form__row">

                            <input type="checkbox" name="is_admin" id="is_admin" value="1"
                                {{ $user->is_admin ? 'checked' : 0 }}>
                            <label for="is_admin">is_admin</label>
                        </div>
                        <div class="category-form__row">
                            <button type="submit">Зберегти зміни</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
