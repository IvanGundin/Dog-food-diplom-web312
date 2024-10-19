<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/formStyles.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/foods.css') }}">
    <title>Оформление заказа</title>
</head>
<style>
    h1 {
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .form {
        margin-bottom: 37px;
    }
</style>

<body>
    @include('layouts.header')
    <h1>Оформление заказа</h1>
    <form id="order-form" class='form' action="{{ route('checkout.submit') }}" method="POST">
        @csrf
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required>
        <label for="phone">Телефон:</label>
        <input type="text" id="phone" name="phone" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <!-- Скрытое поле для передачи данных корзины -->
        <input type="hidden" id="cart-data" name="cart_data">
        <button type="submit" class='button_add'>Оформить заказ</button>
    </form>
    <script>
        document.getElementById('order-form').addEventListener('submit', function(e) {
            // Получаем данные из localStorage
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            // Преобразуем данные в JSON и сохраняем в скрытое поле
            document.getElementById('cart-data').value = JSON.stringify(cart);
        });
    </script>
    @include('layouts.footer')
</body>

</html>
