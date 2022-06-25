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
        Schema::create('servises', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('description');
            $table->string('image')->nullable();
            $table->string('background_image');
            $table->json('other_adventage');
            $table->json('service_conditions');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->constrained()
                    ->references('id')->on('categories')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('position')->default(0);
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('servises');
    }
};
