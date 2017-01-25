<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cakes', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->boolean('is_shaped');
          $table->float('shaped_amount', 8, 2);
          $table->boolean('is_shaped_avail');
          $table->boolean('is_photo_avail');
          $table->string('name');
          $table->text('description')->nullable();
          $table->float('amount', 8, 2);
          $table->float('discount', 8, 2);
          $table->char('discount_type', 4);
          $table->float('minimum_kg', 3, 2);
          $table->unsignedBigInteger('cake_type_id')->index();
          $table->timeTz('avail_from');
          $table->timeTz('avail_to');
          $table->smallInteger('pic_count')->default(1);
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
        Schema::drop('cakes');
    }
}
