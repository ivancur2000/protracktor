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
        Schema::create('event_blocks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('event_version_id');
            $table->tinyInteger('block_type');
            $table->text('block_content');
            $table->unsignedBigInteger('user_id_created');
            $table->unsignedBigInteger('user_id_modified')->nullable();
            $table->timestamps();
            
            $table->foreign('event_version_id')->references('id')->on('event_versions');
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
        Schema::dropIfExists('event_blocks');
    }
};
