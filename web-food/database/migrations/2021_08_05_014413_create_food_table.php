<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('img')->nullable()->default('default-product-image.png');
            $table->text('note')->nullable();
            $table->integer('price');
            $table->integer('discount')->nullable();
            $table->integer('service_charge');
            $table->integer('preparation_time');
//            $table->unsignedBigInteger('tag_id');
//            $table->foreign('tag_id')->references('id')->on('tag_foods');
//            $table->unsignedBigInteger('user_id');
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->unsignedBigInteger('cate_id');
//            $table->foreign('cate_id')->references('id')->on('categories');
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
        Schema::dropIfExists('food');
    }
}
