@php
    use App\Models\Food;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/foods.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/formStyles.css') }}">
    <title>Товары</title>
</head>
<body>
    <!-- Отображение уведомления об успехе -->
    @if (session('success'))
        <div class="alert ">
            {{ session('success') }}
        </div>
    @endif
    @include('layouts.header')
    <div class="container">
        <div class="food">
            @foreach ($foods as $food)
                <div class="food-card">
                    <a href="{{ route('card', $food->id) }}">
                        <div class="card">
                            <img src="{{ $food->img_food }}" class="card-img-top" alt="{{ $food->name_food }}">
                            <div class="card-body">
                                <p class="card-text"><strong>Цена: {{ $food->price_foo }} ₽</strong></p>
                                <h5 class="card-title">{{ $food->name_food }}</h5>
                                <p class="card-text">{{ $food->desc_food }}</p>
                            </div>
                        </div>
                    </a>
                    <button class="add-to-cart button_add" data-id="{{ $food->id }}"
                        data-name="{{ $food->name_food }}" data-price="{{ $food->price_foo }}"
                        data-img="{{ $food->img_food }}">Добавить в
                        корзину</button>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.add-to-cart').forEach(function(button) {
                button.addEventListener('click', function() {
                    let foodItem = {
                        id: this.dataset.id,
                        name: this.dataset.name,
                        price: this.dataset.price,
                        img: this.dataset.img
                    };
                    let cart = JSON.parse(localStorage.getItem('cart')) || [];
                    cart.push(foodItem);
                    localStorage.setItem('cart', JSON.stringify(cart));
                    alert('Товар добавлен в корзину!');
                });
            });
        });
        // Очистка корзины после успешного заказа
        document.addEventListener('DOMContentLoaded', function() {
            const clearCart = "{{ session('clear_basket') }}"; // Получаем параметр очистки из сессии
            if (clearCart) {
                localStorage.removeItem('cart'); // Очищаем корзину в localStorage
            }
        });
    </script>
    @include('layouts.footer')
</body>

</html>
