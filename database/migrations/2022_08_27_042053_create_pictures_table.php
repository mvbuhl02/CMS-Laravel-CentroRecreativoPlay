<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Course;
use App\Models\Picture;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->string('filename', 20)->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->foreignIdFor(Course::class)->references('id')->on('courses')->onDelete('CASCADE');
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
        Schema::table('pictures', function(Blueprint $table){
            $table->dropForeignIdFor(Course::class)->onDelete('CASCADE');
        });
        Schema::dropIfExists('pictures');
    }
};
