<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function submit(Request $request)
    {
        // Валидация данных формы
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'cart_data' => 'required' // Проверяем, что корзина не пуста
        ]);
        // Получаем данные корзины
        $cart = json_decode($request->input('cart_data'), true);
        // Подсчет общей суммы
        $totalPrice = 0;
        // Формируем сообщение
        $message = "Имя: " . $request->input('name') . "\n";
        $message .= "Телефон: " . $request->input('phone') . "\n";
        $message .= "Email: " . $request->input('email') . "\n\n";
        $message .= "Список товаров:\n";
        if (!empty($cart)) {
            foreach ($cart as $item) {
                $message .= "- " . $item['name'] . " (Цена: " . $item['price'] . " ₽)\n";
                $totalPrice += $item['price']; // Добавляем цену товара к общей сумме
            }
            $message .= "\nИтого: " . $totalPrice . " ₽"; // Добавляем итоговую сумму в сообщение
        } else {
            $message .= "Корзина пуста.";
        }
        Mail::send('emails.checkout', [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'cartItems' => $cart,
            'totalPrice' => $totalPrice,
        ], function ($mail) use ($request) {
            $mail->to('GundinIA@yandex.ru')
                ->subject('Новый заказ');
        });
        // Возвращаем страницу корзины и передаем параметр для очистки
        return redirect()->route('index')->with([
            'success' => 'Ваш заказ успешно отправлен!',
            'clear_basket' => true // Передаем дополнительную переменную для очистки
        ]);
    }
}