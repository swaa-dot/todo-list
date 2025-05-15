<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('todolists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('deskripsi');
            $table->dateTime('mulai');
            $table->dateTime('berakhir');
            $table->enum('status',['in_progress', 'completed'])->default('in_progress'); //enum untuk data yang tidak berubah
            $table->timestamps();
            $table->softDeletes();
        });

       
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todolists');
    }
};
