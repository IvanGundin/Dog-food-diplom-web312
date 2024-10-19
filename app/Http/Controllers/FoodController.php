<?php
namespace App\Http\Controllers;
use App\Models\Food;
use Illuminate\Http\Request;
class FoodController extends Controller
{
    // Метод для добавления нового продукта
    public function store(Request $request)
    {
        // Валидация данных формы
        $request->validate([
            'name_food' => 'required|string',
            'desc_food' => 'required|string',
            'price_foo' => 'required|numeric',
            'img_food' => 'required|url',
        ]);
        // Создаем новый продукт
        Food::create([
            'name_food' => $request->input('name_food'),
            'desc_food' => $request->input('desc_food'),
            'price_foo' => $request->input('price_foo'),
            'img_food' => $request->input('img_food'),
        ]);
        return redirect()->route('addFood')->with('success', 'Продукт успешно добавлен');
    }
    // Метод для удаления продукта
    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();
        return redirect()->route('addFood')->with('success', 'Продукт успешно удален');
    }
    // Метод для отображения карточки продукта
    public function card($id)
    {
        $food = Food::findOrFail($id);
        return view('card', ['food' => $food]);
    }
}