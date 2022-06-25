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
        Schema::create('services_advantages', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->string('icon')->nullable();
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->constrained()
                    ->references('id')->on('services')
                    ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('services_advantages');
    }
};
