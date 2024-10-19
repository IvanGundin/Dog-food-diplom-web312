<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/foods.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/product.css') }}">
    <title>Корзина</title>
</head>
<body>
    @include('layouts.header')
    <h1>Корзина</h1>
    <button class="checkout-btn" id="checkout-btn">Оформить заказ</button>
    <div id="cart-items" class="container"></div>
    @include('layouts.footer')
    <script>
        // данные из LocalStorage
        const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
        const cartItemsContainer = document.getElementById('cart-items');
        // Функция для отображения товаров в корзине
        function renderCartItems() {
            cartItemsContainer.innerHTML = '';
            cartItems.forEach((item, index) => {
                // Создаем карточку товара
                const card = document.createElement('div');
                card.classList.add('card');
                const img = document.createElement('img');
                img.src = item.img;
                img.alt = item.name;
                card.appendChild(img);
                const title = document.createElement('div');
                title.classList.add('card-title');
                title.textContent = item.name;
                card.appendChild(title);
                const price = document.createElement('div');
                price.classList.add('card-price');
                price.textContent = item.price + ' ₽';
                card.appendChild(price);
                const removeButton = document.createElement('button');
                removeButton.classList.add('remove-btn');
                removeButton.textContent = 'Удалить товар';
                removeButton.onclick = () => removeItem(index);
                card.appendChild(removeButton);
                cartItemsContainer.appendChild(card);
            });
        }
        function removeItem(index) {
            cartItems.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cartItems));
            renderCartItems();
        }
        document.getElementById('checkout-btn').addEventListener('click', function() {
            if (cartItems.length === 0) {
                alert('Корзина пуста!');
                return;
            }
            window.location.href = '/checkout';
        });
        renderCartItems();
    </script> 
</body>
</html>