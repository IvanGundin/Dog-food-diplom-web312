<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Метод для отображения формы авторизации
    public function showAuthForm()
    {
        return view('auth_admin'); // Убедись, что представление auth.blade.php существует
    }
    // Метод для обработки аутентификации
    public function authenticate(Request $request)
    {
        // Валидация входных данных
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // Получение пользователя по email
        $user = User::where('email', $request->input('email'))->first();
        // Проверка, существует ли пользователь и совпадают ли пароли
        if ($user && Hash::check($request->input('password'), $user->password)) {
            // Успешная авторизация: сохраняем информацию в сессии
            $request->session()->put('authenticated', true);
            return redirect()->route('addFood');
        }
        // Ошибка авторизации
        return redirect()->route('auth.show')->withErrors(['auth_admin' => true]);
    }

    public function showAddProductForm(Request $request)
    {
        // Проверка, аутентифицирован ли пользователь
        if (!$request->session()->get('authenticated')) {
            return redirect()->route('auth.show')->withErrors(['auth_admin' => 'Необходима аутентификация.']);
        }

        // Если аутентифицирован, показываем форму добавления продукта
        return view('addProductForm'); // замените на путь к вашему представлению
    }
    // Метод для выхода из системы (по желанию)
    public function logout(Request $request)
    {
        $request->session()->forget('authenticated'); // Удаляем информацию из сессии
        return redirect()->route('auth.show'); // Перенаправление на страницу авторизации
    }
}