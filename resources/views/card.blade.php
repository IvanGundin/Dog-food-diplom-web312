<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $food->name_food }}</title>
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
</head>
<body>
    <div class="popup-content">
        <img class="popup-img" src="{{ $food->img_food }}" alt="{{ $food->name_food }}">
        <h2 class="popup-title">{{ $food->name_food }}</h2>
        <p class="popup-price">Цена: {{ $food->price_foo }} ₽</p>
        <p class="popup-desc">{{ $food->desc_food }}</p>
    </div>
</body>
</html>