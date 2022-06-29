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
        Schema::create('videos', function (Blueprint $table) {
           
            $table->string('videoId',255);
            $table->primary('videoId');
            $table->string('title',255);
            $table->longText('description')->nullable();
            $table->string('url',255);
            $table->dateTime('publishTime')->nullable();
            $table->dateTime('publishedAt');
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
        Schema::dropIfExists('videos');
    }
};
