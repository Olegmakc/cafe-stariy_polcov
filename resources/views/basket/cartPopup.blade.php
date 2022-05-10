<div id="popup" class="popup">
    <div class="popup__body">
        <div class="popup__content">
            <a href="#" class="popup__close close-popup _icon-icons-close"></a>
            <div class="popup__title">Підтвердження замовлення:</div>
            <div class="popup__label">Загальна сума замовлення: <span>{{ $order->getFullSum() }} грн.</span></div>
            <div class="popup__subtitle">Вкажіть свої дані, щоб ми могли з вами зв'язатись:</div>
            <form action="{{ route('basketConfirm') }}" method="POST" id="orderForm"
                class="popup__orderform orderform">
                @csrf
                <div class="orderform__row">
                    <label for="name">Ваше ім'я</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" @error('name')  @enderror
                        class="orderform__input" placeholder="Павло Петренко">
                    <div id="name-error" class="alert-danger"></div>
                </div>
                <div class="orderform__row">
                    <label for="phone">Номер телефону</label>
                    <input type="text" name="phone" id="phone" class="orderform__input" value="{{ old('phone') }}"
                        @error('phone')  @enderror placeholder="+38 099 00 00 00">
                    <div id="phone-error" class="alert-danger"></div>
                </div>
                <div class="orderform__row">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="orderform__input" @error('email')  @enderror
                        placeholder="example@site.com">
                    <div id="email-error" class="alert-danger"></div>
                </div>
                <div class="orderform__row">
                    <label for="destination_adress">Адреса доставки (вулиця, № дому, підїзду та квартири)</label>
                    <input type="text" name="destination_adress" id="destination_adress"
                        @error('destination_adress')  @enderror class="orderform__input"
                        placeholder="вул. Володимирська, 45а, підїзд 5, кв. 295">
                    <div id="destination_adress-error" class="alert-danger"></div>
                </div>
                <div class="orderform__row">
                    <label for="comment">Коментар</label>
                    <textarea class="orderform__text" @error('comment')  @enderror name="comment" id="comment"
                        placeholder="домофон 007, одноразові прибори не потрібні"
                        rows="5">{!! old('comment') !!}</textarea>
                    <div id="comment-error" class="alert-danger"></div>
                </div>
                <div class="orderform__row">
                    <div class="radio__row">
                        <label for="">Спосіб оплати</label><br>
                        <input type="radio" id="payment" name="payment" value="cash" class="radio__input">
                        <label for="payment">Готівкою при доставці</label> <br>
                        <input type="radio" id="payment" name="payment" value="credit" checked class="radio__input">
                        <label for="payment"> Кредитною картою (Visa, Mastercard) або Privat24</label>
                    </div>
                    <div class="orderform__radio radio">
                        <div class="radio__row">

                        </div>

                        <div id="payment-error" class="alert-danger"></div>
                    </div>
                </div>
                <div class="orderform__row">
                    <div class="orderform__totalamount totalamount">
                        <div class="totalamount__price"><span>Загальна сума:</span> {{ $order->getFullSum() }} грн
                        </div>
                    </div>
                </div>
                <div class="orderform__row">
                    <button type="submit" class="orderform__btn _icon-send" name="
     orderform_button">Замовити</button>
                </div>
            </form>
        </div>
    </div>
</div>
