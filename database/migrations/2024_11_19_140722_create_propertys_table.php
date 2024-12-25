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
        Schema::create('propertys', function (Blueprint $table) {
            $table->id();
            $table->string('tipe');
            $table->string('title');
            $table->string('luas_tanah');
            $table->string('luas_bangunan');
            $table->string('desc1');
            $table->string('desc2');
            $table->string('harga');
            $table->string('foto');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('propertys');
    }
    
};
