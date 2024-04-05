<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['Free', 'Premium'])->default('Free');
            $table->text('description')->nullable();
            $table->text('faq')->nullable();
            $table->string('slug');
            $table->text('embed')->nullable();
            $table->float('regular_price')->default(0);
            $table->float('price')->default(0);
            $table->json('file')->nullable();
            $table->json('images')->nullable();
            $table->json('tags')->nullable();
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
        Schema::dropIfExists('products');
    }
}
