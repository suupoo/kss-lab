<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            //共通列
            $table->bigIncrements('id');
            //テーブル列
            $table->smallInteger('function_cd');
            $table->integer('attribute_cd');
            $table->integer('detail_cd');
            $table->string('name');
            $table->string('displayText');
            $table->string('values',1000);
            $table->string('defaultValues',1000);
            $table->text(   'description');
            $table->boolean('multiValue');
            //共通列
            $table->bigInteger('edit_user');
            $table->boolean('enable')
                ->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
