<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name_food')->require();
            $table->string('desc_food');
            $table->string('price_foo')->nullable();
            $table->string('img_food');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
