<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderCakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_cakes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('cake_id')->index();
            $table->boolean('is_photo');
            $table->text('photo_url');
            $table->string('message')->nullable();
            $table->boolean('is_eggless');
            $table->boolean('is_cheeseless');
            $table->unsignedBigInteger('flavour_id');
            $table->float('kg', 3, 2);
            $table->integer('quantity');
            $table->integer('amount_sold');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_cakes');
    }
}
