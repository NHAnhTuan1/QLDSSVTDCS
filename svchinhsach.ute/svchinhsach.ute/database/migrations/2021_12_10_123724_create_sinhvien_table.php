<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinhvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinhvien', function (Blueprint $table) {
            $table->id();

            $table->string('sv_ten')->nullable();
            $table->tinyInteger('sv_gioitinh')->nullable();
            $table->date('sv_ngaysinh')->nullable();
            $table->string('sv_email')->unique();
            $table->string('sv_password');
            $table->string('sv_sdt')->nullable();
            $table->string('sv_cmnd')->nullable();
            $table->string('sv_diachi')->nullable();

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
        Schema::dropIfExists('sinhvien');
    }
}
