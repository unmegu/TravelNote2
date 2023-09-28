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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('body', 200);
            $table->boolean('status')->nullable();
            $table->double('latitude',9,7)->nullable();
            $table->double('longitude',10,7)->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');   
            $table->timestamps();
            $table->softDeletes();
            $table->string('image_url')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
