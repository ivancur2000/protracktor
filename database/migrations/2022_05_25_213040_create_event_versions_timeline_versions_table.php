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
        Schema::create('event_versions_timeline_versions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->boolean('enabled');
            $table->unsignedBigInteger('timeline_version_id');
            $table->unsignedBigInteger('event_version_id');
            $table->timestamps();

            $table->foreign('timeline_version_id')->references('id')->on('timeline_versions');
            $table->foreign('event_version_id')->references('id')->on('event_versions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_versions_timeline_versions');
    }
};
