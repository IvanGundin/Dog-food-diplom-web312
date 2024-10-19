<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Food extends Model
{
    protected $fillable = [
        'name_food',
        'desc_food',
        'price_foo',
        'img_food',
    ];
}
