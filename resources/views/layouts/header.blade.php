<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    .add_heder {
        display: flex;
        align-items: center;
        gap: 25px;
    }

    .add_heder a {
        font-size: 25px;
    }

    #user-content {
        font-size: 18px;
        text-shadow: rgb(255, 128, 0) 1px 0 2px;
    }

    #user-content:hover {
        color: #3300ff;
        font-size: 18px;
    }
</style>

<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <a href="{{ url('https://dogfood-web.tilda.ws') }}">
                    <img src="/logo.svg" alt="Логотип">
                </a>
            </div>
            <nav class="nav-links">
                {{-- Проверка на текущий именованный маршрут "addProductForm" --}}
                @if (Route::currentRouteName() == 'addFood')
                    <div class='add_heder'>
                        <a href="{{ route('addProductForm') }}">Добавить новый продукт</a>
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            <button class='button_logout' type="submit">Выйти</button>
                        </form>
                    </div>
                @elseif (Route::currentRouteName() == 'addProductForm')
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button class='button_logout' type="submit">Выйти</button>
                    </form>
                @else
                    {{-- Ссылки будут показаны на всех других страницах --}}
                    <a href="{{ route('cart') }}" id="cart-link">Корзина</a>
                    <a href="{{ url('https://dogfood-web.tilda.ws/about') }}">О нас</a>
                    <a href="{{ url('https://dogfood-web.tilda.ws/best') }}">Почему мы?</a>
                    <a href="{{ url('https://dogfood-web.tilda.ws/contacts') }}">Контакты</a>
                    <a href="{{ url('https://dogfood-web.tilda.ws/development') }}">Проект</a>
                    <a href="{{ route('user_content') }}" id="user-content">Личный кабинет</a>
                @endif
            </nav>
        </div>
    </header>
</body>

</html>
