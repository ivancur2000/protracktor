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
        Schema::table('users', function (Blueprint $table) {
            $table->string('company')
                ->after('profile_photo_path')
                ->nullable();

            $table->string('phone_number')
                ->after('company')
                ->nullable();

            $table->string('timezone')
                ->after('phone_number')
                ->nullable();

            $table->string('account_access')
                ->after('timezone')
                ->nullable();
                
            $table->string('location')
                ->after('account_access')
                ->nullable();
            $table->integer('state_acount')
                ->after('location')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('company');
            $table->dropColumn('phone_number');
            $table->dropColumn('timezone');
            $table->dropColumn('account_access');
            $table->dropColumn('location');
            $table->dropColumn('state_acount');
        });
    }
};
