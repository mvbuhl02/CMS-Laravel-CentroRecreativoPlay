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
            $table->string('phone', 50)->nullable();
            $table->string('whatsapp', 50)->nullable();
            $table->string('instagram', 50)->nullable();
            $table->string('facebook', 50)->nullable();
            $table->text('address')->nullable();
            $table->text('email', 100)->nullable();
            $table->string('logo', 20)->nullable();
            $table->string('picture', 20)->nullable();
            $table->string('favicon', 20)->nullable();
            $table->text('text', 900)->nullable();
            $table->string('title', 200)->nullable();
            $table->string('keywords', 600)->nullable();
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
