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
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('phone', 50);
            $table->string('whatsapp', 50);
            $table->string('instagram', 50);
            $table->string('facebook', 50);
            $table->text('address');
            $table->text('email', 100);
            $table->string('logo', 20);
            $table->string('picture', 20);
            $table->string('favicon', 20);
            $table->text('text', 900);
            $table->string('title', 200);
            $table->string('keywords', 600);
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
        Schema::dropIfExists('about');
    }
};
