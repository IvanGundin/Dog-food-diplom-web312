<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новый заказ</title>
</head>
<body>
    <h1>Новый заказ от {{ $name }}</h1>
    <p>Телефон: {{ $phone }}</p>
    <p>Email: {{ $email }}</p>
    <h2>Список товаров:</h2>
    <ul>
        @foreach ($cartItems as $item)
            <li>{{ $item['name'] }} - {{ $item['price'] }} ₽</li>
        @endforeach
    </ul>
    <p><strong>Итого:</strong> {{ $totalPrice }} ₽</p> <!-- Итоговая сумма -->
</body>
</html>
