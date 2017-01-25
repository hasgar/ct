<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->unsignedBigInteger('cake_id')->index();
            $table->float('value',8,2);
            $table->char('type',2);
            $table->timestampTz('valid_from');
            $table->timestampTz('valid_to');
            $table->float('amount_greater_than',8,2);
            $table->float('amount_lesser_than',8,2);
            $table->boolean('status')->index()->default(1);
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
        Schema::drop('coupons');
    }
}
