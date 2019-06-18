<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersPhoneMumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table  ->integer('country_cd')
                    ->nullable()
                    ->after('name');

            $table  ->string('phone_number')
                    ->nullable()
                    ->after('country_cd');
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
            $table  ->dropColumn(
                'phone_number','country_cd'
            );
        });
    }
}
