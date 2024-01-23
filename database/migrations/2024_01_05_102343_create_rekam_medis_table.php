<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->text('diagnosa')->nullable();
            $table->string('keluhan')->nullable();
            $table->text('anamesis')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('berat');
            $table->string('tinggi');
            $table->string('tensi');
            $table->enum('status', ['antri', 'sudah diperiksa', 'selesai'])->default('antri');
            $table->unsignedBigInteger('dokter_id')->nullable();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('dokter_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekam_medis');
    }
};
