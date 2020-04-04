<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class UpdateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->string('slug')->nullable();
            $table->text('content')->nullable();
            $table->string('url')->nullable();
        });

        DB::table('videos')->orderBy('id')->each(function ($video) {
            DB::table('videos')
                ->where('id', $video->id)
                ->update(['slug' => Str::slug("{$video->title} {$video->id}")]);
        });

        Schema::table('videos', function (Blueprint $table) {
            $table->unique('slug')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('content');
            $table->dropColumn('url');
        });
    }
}
