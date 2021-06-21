<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->index('updated_at');
        });

        Schema::table('decisions', function (Blueprint $table) {
            $table->index('updated_at');
        });

        Schema::table('videos', function (Blueprint $table) {
            $table->index('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropIndex(['updated_at']);
        });

        Schema::table('decisions', function (Blueprint $table) {
            $table->dropIndex(['updated_at']);
        });

        Schema::table('videos', function (Blueprint $table) {
            $table->dropIndex(['updated_at']);
        });
    }
}
