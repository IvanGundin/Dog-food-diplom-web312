<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/foods.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
    <title>Добавить Товары</title>
</head>
<style>
    .button_del {
        width: 100%;
        padding: 10px;
        color: black;
        background-color: #efff09;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color .3s;
    }

    .button_del:hover {
        color: white;
        background-color: #ff4d4d;
    }
</style>

<body>
    @include('layouts.header')
    <h1>Режим администратора</h1>
    <div class="container">
        {{-- Вывод ошибок --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- Сообщение об успехе --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        {{-- Список продуктов --}}
        <div class="food">
            @foreach ($foods as $food)
                <div class="food-card">
                    <img src="{{ $food->img_food }}" class="card-img-top" alt="{{ $food->name_food }}">
                    <div class="card-body">
                        <p class="card-text"><strong>Цена: {{ $food->price_foo }} ₽</strong></p>
                        <h5 class="card-title">{{ $food->name_food }}</h5>
                        <p class="card-text">{{ $food->desc_food }}</p>
                    </div>
                    <form action="{{ route('food.destroy', $food->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class='button_del'>Удалить</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
