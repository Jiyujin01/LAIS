<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classs_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('suffix')->nullable();
            $table->string('gender');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('classs_id')->references('id')->on('classses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
