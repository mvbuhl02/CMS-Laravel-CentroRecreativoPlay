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
        Schema::create('us', function (Blueprint $table) {
            $table->id();
            $table->string('main_text', 400)->nullable();;
            $table->text('description')->nullable(); ;
            $table->string('main_picture', 20)->nullable();
            $table->text('text');
            $table->string('picture', 20);
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
        Schema::dropIfExists('us');
    }
};
