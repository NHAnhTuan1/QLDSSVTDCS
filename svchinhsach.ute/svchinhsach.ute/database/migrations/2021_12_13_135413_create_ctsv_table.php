<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtsvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctsv', function (Blueprint $table) {
            $table->id();

            $table->string('ctsv_ten')->nullable();
            $table->string('ctsv_email')->unique();
            $table->string('password');
            $table->string('ctsv_sdt')->nullable();
            $table->string('ctsv_diachi')->nullable();

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
        Schema::dropIfExists('ctsv');
    }
}
