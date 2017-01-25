<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('eggless_charge',8,2);
            $table->float('cheeseless_charge',8,2);
            $table->float('photo_charge',8,2);
            $table->string('latutude')->nullable();
            $table->string('longtitude')->nullable();
            $table->timeTz('open_from');
            $table->timeTz('closed_at');
            $table->boolean('status')->index()->default(1);
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
        Schema::drop('store_settings');
    }
}
