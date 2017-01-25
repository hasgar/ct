<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeysToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('cakes', function (Blueprint $table) {
       $table->foreign('cake_type_id')
       ->references('id')->on('cake_types')
       ->onDelete('cascade');
     });


    Schema::table('coupon_used', function (Blueprint $table) {
     $table->foreign('coupon_id')
     ->references('id')->on('coupons')
     ->onDelete('cascade');
     $table->foreign('user_id')
     ->references('id')->on('users')
     ->onDelete('cascade');
     $table->foreign('order_id')
     ->references('id')->on('orders')
     ->onDelete('cascade');
   });

   Schema::table('online_payment', function (Blueprint $table) {
    $table->foreign('order_id')
    ->references('id')->on('orders')
    ->onDelete('cascade');

    });

    Schema::table('orders', function (Blueprint $table) {
     $table->foreign('status_id')
     ->references('id')->on('status')
     ->onDelete('cascade');
     $table->foreign('timeslot_id')
     ->references('id')->on('timeslots')
     ->onDelete('cascade');
     $table->foreign('emirate_id')
     ->references('id')->on('emirates')
     ->onDelete('cascade');
     $table->foreign('user_id')
     ->references('id')->on('users')
     ->onDelete('cascade');
     $table->foreign('shipping_type_id')
     ->references('id')->on('shipping_type')
     ->onDelete('cascade');

     });

     Schema::table('order_addons', function (Blueprint $table) {
      $table->foreign('order_id')
      ->references('id')->on('orders')
      ->onDelete('cascade');
      $table->foreign('user_id')
      ->references('id')->on('users')
      ->onDelete('cascade');
      $table->foreign('addon_id')
      ->references('id')->on('addons')
      ->onDelete('cascade');
      });

      Schema::table('order_cakes', function (Blueprint $table) {
       $table->foreign('order_id')
       ->references('id')->on('orders')
       ->onDelete('cascade');
       $table->foreign('user_id')
       ->references('id')->on('users')
       ->onDelete('cascade');
       $table->foreign('cake_id')
       ->references('id')->on('cakes')
       ->onDelete('cascade');
       });

       Schema::table('order_status', function (Blueprint $table) {
        $table->foreign('order_id')
        ->references('id')->on('orders')
        ->onDelete('cascade');
        $table->foreign('status_id')
        ->references('id')->on('status')
        ->onDelete('cascade');
        });


         Schema::table('timeslots', function (Blueprint $table) {
          $table->foreign('shipping_type_id')
          ->references('id')->on('shipping_type')
          ->onDelete('cascade');
          });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('add_keys');
    }
}
