<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
    <title>Авторизация</title>
</head>
<body>
    <div class="auth-message-container">
        <div class="auth-message">
            <h1>Вы не авторизованы!</h1>
            <p>Для доступа к этой странице необходимо выполнить авторизацию.</p>
            <a href="{{ route('auth.show') }}" class="btn">Войти</a>
        </div>
    </div>
</body>
</html>