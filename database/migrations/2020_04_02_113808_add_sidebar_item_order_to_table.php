<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddSidebarItemOrderToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sidebar_items', function (Blueprint $table) {
            $table->integer('weight');
        });

        DB::statement('UPDATE sidebar_items SET weight = id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sidebar_items', function (Blueprint $table) {
            $table->dropColumn('weight');
        });
    }
}
