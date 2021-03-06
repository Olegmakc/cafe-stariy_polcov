<header class="header">
    <div class="header__wrapper lock-padding">
        <div class="header__container container">
            <div class="header__body">
                <a href="/" class="header__logo">
                    <img src="{{ Storage::url('logo/logo.jpg') }}" alt="logo">
                </a>
                <div class="header__menu menu-header">
                    <nav class="menu-header__body">
                        <ul class="menu-header__list">
                            <li class="menu-header__item">
                                <a href="{{ route('index') }}"
                                    class="menu-header__link {{ request()->routeIs('index') ? 'active' : '' }}">
                                    Головна</a>
                            </li>
                            <li class="menu-header__item">
                                <a href="{{ route('menu') }}"
                                    class="menu-header__link {{ request()->routeIs('menu*') ? 'active' : '' }}">
                                    Меню</a>
                            </li>
                            <li class="menu-header__item">
                                <a href="{{ route('about') }}"
                                    class="menu-header__link {{ request()->routeIs('about') ? 'active' : '' }}">
                                    Про нас</a>
                            </li>
                            <li class="menu-header__item">
                                <a href="{{ route('contact') }}"
                                    class="menu-header__link {{ request()->routeIs('contact') ? 'active' : '' }}">
                                    Контакти</a>
                            </li>
                            <li class="menu-header__item">
                                <a href="{{ route('news') }}"
                                    class="menu-header__link {{ request()->routeIs('news*') ? 'active' : '' }}">
                                    Новини
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header__actions actions-header">
                    @guest
                        <div class="actions-header__link phones-header">
                            <div class="phones-header__item">
                                <a href="tel:+380955280214" class="phones-header__button _icon-phone"><span>+38 (095) 528 02
                                        14</span></a>
                                <ul class="phones-header__list">
                                    <li><a href="tel:+380332716891" class="phones-header__link ">+38 (0332) 71 68 91</a>
                                    </li>
                                    <li><a href="tel:+380955280214" class="phones-header__link ">+38 (095) 528 02 14</a>
                                    </li>
                                    <li class="phones-header__label">з 11:00 до 22:00</li>
                                </ul>
                            </div>
                        </div>
                        <a href="{{ route('basket') }}"
                            class="actions-header__link actions-header__link_cart _icon-cart">
                            @isset($order)
                                @if ($order->products->count() > 0)
                                    <span>
                                        {{ $order->products->count() }}
                                    </span>
                                @endif
                            @endisset
                        </a>
                    @endguest
                    @auth
                        <li class="actions-header__item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="actions-header__logout" type="submit">Вийти</button>
                            </form>
                        <li class="actions-header__item"><a href="{{ route('dashboard') }}"
                                class="actions-header__link">Админ панель</a></li>

                        </li>
                    @endauth
                    <button type="button" class="icon-menu"><span></span></button>
                </div>
            </div>
        </div>
    </div>
</header>
