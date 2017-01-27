<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('status_id')->index()->default(1);
            $table->unsignedBigInteger('timeslot_id')->index();
            $table->unsignedBigInteger('emirate_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('shipping_type_id')->index();
            $table->unsignedBigInteger('coupon_id')->index()->nullable(); //dont make foriegn
            $table->boolean('is_payment_online');
            $table->boolean('online_pay_status');
            $table->float('net_total',8,2);
            $table->float('service_charge',8,2);
            $table->float('delivery_charge',8,2);
            $table->float('extra_amount',8,2);
            $table->float('discount',8,2);
            $table->float('grand_total',8,2);
            $table->boolean('have_addon');
            $table->string('your_name');
            $table->string('reciever_name')->nullable();
            $table->text('flat_no_and_builder')->nullable();
            $table->string('landmark')->nullable();
            $table->text('street_address');
            $table->string('your_phone');
            $table->string('reciever_phone')->nullable();
            $table->date('delivery_date');
            $table->text('notes');
            $table->string('token');
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
        Schema::drop('orders');
    }
}
