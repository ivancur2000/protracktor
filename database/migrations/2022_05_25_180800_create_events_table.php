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
        Schema::create('events', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name');
            $table->boolean('sms')->nullable();
            $table->boolean('preview')->nullable();
            $table->boolean('edit')->nullable();
            $table->boolean('config')->nullable();
            $table->unsignedBigInteger('user_id_created');
            $table->unsignedBigInteger('user_id_modified')->nullable();
            $table->unsignedBigInteger('user_id_deleted')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->boolean('is_deleted')->nullable();

            $table->foreign('user_id_created')->references('id')->on('users');
            $table->foreign('user_id_modified')->references('id')->on('users');
            $table->foreign('user_id_deleted')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
