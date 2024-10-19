<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/formStyles.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/foods.css') }}">
    <title>Авторизация</title>
</head>
<style>
    body {
        margin: 0;
    }

    h1 {
        margin-top: 50px;
        margin-bottom: 30px;
    }

    .form {
        margin-bottom: 96px;
    }
</style>

<body>
    @include('layouts.header')
    <h1>Авторизация</h1>
    <form class='form' action="{{ route('auth.authenticate') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button class='button_add' type="submit">Войти</button>
    </form>
    @include('alert')
    @include('layouts.footer')
</body>

</html>
