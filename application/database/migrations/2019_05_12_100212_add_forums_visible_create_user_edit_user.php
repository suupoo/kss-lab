<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForumsVisibleCreateUserEditUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forums', function (Blueprint $table) {
            $table  ->bigInteger('edit_user')
                    ->after('category_id');

            $table  ->smallInteger('status')
                    ->after('edit_user');

            $table  ->boolean('visible')
                    ->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('forums', function (Blueprint $table) {
            $table  ->dropColumn('edit_user');
            $table  ->dropColumn('status');
            $table  ->dropColumn('visible');
        });
    }
}
