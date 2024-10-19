<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

abstract class Controller
{
    public function index(Request $request)
    {
        // Проверка, авторизован ли пользователь
        if (!$request->session()->has('authenticated')) {
            return view('authMessage');  // Возвращаем шаблон с сообщением об авторизации
        }
        // Получаем список продуктов
        $foods = Food::all();
        return view('addFood', ['foods' => $foods]);
    }
    public function foods()
    {
        $foods = Food::all();
        return view('index', ['foods' => $foods]);
    }
}
