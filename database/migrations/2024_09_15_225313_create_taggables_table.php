<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('taggables', function (Blueprint $table) {
           $table->bigIncrements('id');
            
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('taggable_id');  // Asegúrate de que esta línea exista
            $table->string('taggable_type');

            
            $table->timestamps();
            
            $table->foreign('tag_id')->references('id')->on('tags')
             ->onDelete('cascade')
             ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taggables');
    }
};
