@component('mail::message')

    Дякуємо <b>{{ $order->name }}</b>, за ваше замовлення!

    Ваше замовлення: #_{{ $order->id }}, успішно підтвердженно!
    Товари які ви замовили:

   @component('mail::table')
	| # | Назва страви | К-cть | Ціна | Сумма |
	|:--|:-------------|:-----:|:----:|:------:|
	@foreach ($order->products as $product)
		|{{$loop->iteration}}|{{ $product->title }}| {{$product->count}}|{{ $product->price }} грн. |{{$product->price * $product->count}} грн.|
	@endforeach
   @endcomponent
	@component('mail::panel')
	Загальна сума замовлення: **{{$order->sum}} грн.**
	@endcomponent

    Дякуємо за замовлення,
    Кафе-бар "Старий полковник"
@endcomponent
