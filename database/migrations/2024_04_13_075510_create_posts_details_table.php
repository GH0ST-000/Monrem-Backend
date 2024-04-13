<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('posts_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('posts_id');
            $table->text('content');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts_details');
    }
};
