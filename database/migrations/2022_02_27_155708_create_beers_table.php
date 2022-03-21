<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->string('origin');
            $table->decimal('abv', 5, 4);
            $table->string('ingredient');
            $table->string('flavor');
            $table->string('format');
            $table->decimal('price', 10, 2);
            $table->text('details')->nullable();
            $table->integer('quantity_available');
            $table->string('image_url', 2048);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beers');
    }
};
