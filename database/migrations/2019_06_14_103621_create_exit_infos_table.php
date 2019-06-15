<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExitInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exit_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tourist_name');
            $table->string('passport_number');
            $table->boolean('tourist_type')->default(1);
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('checkpoint_id');
            $table->string('gender');
            $table->text('reviews')->nullable();
            $table->string('nepali_date')->nullable();
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
        Schema::dropIfExists('exit_infos');
    }
}
