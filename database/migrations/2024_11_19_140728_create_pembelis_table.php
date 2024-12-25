<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pembelis', function (Blueprint $table) {
        $table->id();        
        $table->string('nama');
        $table->string('nomor_kartu');
        $table->string('alamat_penagih');
        $table->string('title');
        $table->string('tipe');
        $table->string('harga'); // Pastikan tipe data sesuai harga        
        $table->foreignId('property_id')->constrained('property')->onDelete('cascade');
        $table->timestamps();
    });
    
}

public function down()
{
    Schema::dropIfExists('pembelis');
}

};
