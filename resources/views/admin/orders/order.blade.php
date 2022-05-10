<x-app-layout>
    <div class="py-6 admin__background">
        <div class="container mx-auto px-6">
            <div class="shadow-sm sm:rounded-lg bg-greey-200">
                @if (@session()->has('category-success'))
                    <div class="alert alert-primary" role="alert">
                        {{ session()->get('category-success') }}
                    </div>
                @endif
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Замовлення:') }} {{ '#' . $order->id }}
                    </h2>
                </x-slot>
                <div class="order__block order">
                    <div class="order__title order-title">Інформація про замовника:</div>
                    <table class="admin__table admin__table_products">
                        <tr>
                            <th>Поле</th>
                            <th>Значення </th>
                        </tr>
                        <tr>
                            <td>Ім'я замовника</td>
                            <td>{{ $order->name }}</td>
                        </tr>
                        <tr>
                            <td>Телефон </td>
                            <td>{{ $order->phone }}</td>
                        </tr>
                        <tr>
                            <td>Електрона адреса</td>
                            <td>{{ $order->email }}</td>
                        </tr>
                        <tr>
                            <td>Адреса доставки</td>
                            <td>{{ $order->destination_adress }}</td>
                        </tr>
                        <tr>
                            <td>Коментар до замовлення</td>
                            <td>{{ $order->comment }}</td>
                        </tr>
                        <tr>
                            <td>Тип оплати</td>
                            <td>{{ $order->payment }}</td>
                        </tr>
                    </table>
                    <div class="order__subtitle order-title">Інформація про замовлення:</div>
                    <table class="admin__table admin__table_order">
                        <tr>
                            <th>id</th>
                            <th>Назва</th>
                            <th>Категорія </th>
                            <th>Ціна</th>
                            <th>К-сть</th>
                            <th>Сума</th>
                        </tr>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->price }} грн.</td>
                                <td>{{ $product->pivot->count }}</td>
                                <td>{{ $product->getPriceForCount() }} грн.</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="order__full-price order-title">Загальна сума замовлення:
                    <span>{{ $order->calculateFullSum() }} грн.</span>
                </div>
                <a href="{{ route('orders') }}" class="btn btn__create">Повернутись до замовлень</a>
            </div>
        </div>
    </div>
</x-app-layout>
