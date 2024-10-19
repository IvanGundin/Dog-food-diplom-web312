<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/formStyles.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/foods.css') }}">
    <title>Добавить Товары</title>
</head>
<style>
    h1 {
        margin-top: 30px;
        margin-bottom: 10px;
    }

    .form {
        margin-bottom: 30px;
    }
</style>

<body>
    @include('layouts.header')
    <h1>Добавить новый товар</h1>
    <form class='form' action="{{ route('food.store') }}" method="POST">
        @csrf
        <label for="name_food">Название:</label>
        <input type="text" name="name_food" id="name_food" required>

        <label for="desc_food">Описание:</label>
        <input type="text" name="desc_food" id="desc_food" required>

        <label for="price_foo">Цена:</label>
        <input type="number" name="price_foo" id="price_foo" required>

        <label for="img_food">URL изображения:</label>
        <input type="text" name="img_food" id="img_food" required>

        <button class='button_add' type="submit">Добавить</button>
    </form>
    @include('layouts.footer')
</body>

</html>
