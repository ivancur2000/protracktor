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
        Schema::table('timelines', function (Blueprint $table) {
            $table->unsignedBigInteger('timeline_version_id')
                ->after('user_id_modified')
                ->nullable();
            
            $table->foreign('timeline_version_id')->references('id')->on('timeline_versions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timelines', function (Blueprint $table) {
            $table->dropForeign(['timeline_version_id']);
            $table->dropColumn('timeline_version_id');
        });
    }
};
