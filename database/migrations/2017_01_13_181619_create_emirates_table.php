<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmiratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emirates', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('latitude')->nullable();
          $table->string('lontitude')->nullable();
          $table->smallInteger('alternative_name')->nullable();
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
        Schema::drop('emirates');
    }
}
