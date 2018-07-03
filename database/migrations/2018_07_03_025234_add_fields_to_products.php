<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function($table){

            $table->integer('subsistence_id')->unsigned()->nullable();
            $table->foreign('subsistence_id')->references('id')->on('subsistences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function($table){
            $table->dropColumn([
                'subsistence_id'
            ]);
        });
    }
}
