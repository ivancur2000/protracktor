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
        Schema::create('timeline_versions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('timeline_id');
            $table->string('name');
            $table->unsignedBigInteger('user_id_created');
            $table->unsignedBigInteger('user_id_modified')->nullable();
            $table->timestamps();

            $table->foreign('timeline_id')->references('id')->on('timelines');
            $table->foreign('user_id_created')->references('id')->on('users');
            $table->foreign('user_id_modified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timeline_versions');
    }
};
