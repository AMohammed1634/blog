<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnToUserImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_images', function (Blueprint $table) {
            //
            $table->integer('offset_x')->nullable()->default(-1);
            $table->integer('offset_y')->nullable()->default(-1);
            $table->integer('obj_width')->nullable()->default(-1);
            $table->integer('obj_height')->nullable()->default(-1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_images', function (Blueprint $table) {
            //
            $table->dropColumn('offset_x');
            $table->dropColumn('offset_y');
            $table->dropColumn('obj_width');
            $table->dropColumn('obj_height');

        });
    }
}
