@forelse ($orders as $order)
    <tr>
        <td>Номер замовлення</td>
        <td>#{{ $order->id }}</td>
    </tr>
    <tr>
        <td>Статус замовлення </td>
        <td>{{ $order->status }}</td>
    </tr>
    <tr>
        <td>Ім'я замовника</td>
        <td>{{ $order->name }}</td>
    </tr>
    <tr>
        <td>Телефон</td>
        <td>{{ $order->phone }}</td>
    </tr>
    <tr>
        <td>Елекронна адреса</td>
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
    <tr>
        <td>Замовлення створенно:</td>
        <td>{{ $order->updated_at->format('H:i d/m/Y') }}</td>
    </tr>
    <tr>
        <td>Дії</td>
        <td><a class="btn btn__succes" type="button" href="{{ route('orderInfo', $order) }}">Переглянути</a></td>
    </tr>
    <tr class="separator" colspan="2"></tr>
@empty
    <tr>
        <td colspan="2" align="center">Записів не знайдено!</td>
    </tr>
@endforelse
<tr>
    <td colspan="2" align="center"><span class="order__pagination">{!! $orders->links() !!}</span></td>
</tr>
