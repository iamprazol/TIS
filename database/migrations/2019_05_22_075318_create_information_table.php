<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('checkpoint_id');
            $table->unsignedBigInteger('country_id');
            $table->foreign('checkpoint_id')->references('id')->on('checkpoints')->onDelete('cascade');
            $table->string('tourist_name');
            $table->boolean('tourist_type')->default(0);
            $table->string('duration')->nullable();
            $table->integer('age')->nullable();
            $table->string('gender');
            $table->date('visa_period')->nullable();
            $table->string('passport_number')->default(45454545454);
            $table->string('provisional_card')->nullable();
            $table->boolean('editable')->default(1);
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
        Schema::dropIfExists('information');
    }
}
