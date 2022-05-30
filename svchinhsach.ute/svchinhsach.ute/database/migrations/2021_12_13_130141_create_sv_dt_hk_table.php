<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSvDtHkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sv_dt_hk', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('sinhvien_id');
            $table->tinyInteger('doituong_id');
            $table->tinyInteger('hk_id');
            $table->tinyInteger('tinhtrang');
            
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
        Schema::dropIfExists('sv_dt_hk');
    }
}
