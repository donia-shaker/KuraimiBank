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
        Schema::create('website_infos', function (Blueprint $table) {
            $table->id();
            $table->json('applay_for_services');
            $table->string('phone');
            $table->string('fax');
            $table->string('free_number');
            $table->string('mail_box');
            $table->string('email');
            $table->json('about_us');
            $table->json('value_principles');
            $table->json('strategy_statement');
            $table->json('board_members');
            $table->boolean('is_active')->default(0);
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
        Schema::dropIfExists('website_infos');
    }
};
