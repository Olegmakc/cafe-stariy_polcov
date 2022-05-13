<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Користувачі') }}
        </h2>
    </x-slot>
    <div class="py-2 admin__background">
        <div class="container mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm ">
                @if (@session()->has('success'))
                    <div class="message message_success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <table class="admin__table">
                    <tr>
                        <th>id</th>
                        <th>Ім'я</th>
                        <th>Email</th>
                        <th>is_admin</th>
                        <th>Дії</th>
                    </tr>
                    @foreach ($users as $user)
                        <tbody>
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->is_admin }}</td>
                                <td>
                                    <form class="product-delete" action="{{ route('users.destroy', $user->id) }}"
                                        method="POST">
                                        <a class="btn btn__warning"
                                            href="{{ route('users.edit', $user) }}">Редагувати</a>

                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn__danger"
                                            onclick="return confirm('Are you sure?')">Видалити</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
