<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->text('short_content')->nullable();
            $table->text('content');
            $table->bigInteger('institution_id');
            $table->bigInteger('user_id');
            $table->softDeletes();
            $table->timestamps();
        });
        $user_table = 'news';
        Schema::table($user_table, function ($table) use ($user_table) {
            $table->string('preview_token')->nullable();
            $table->boolean('published')->default(true);
            $table->bigInteger('draft_parent_id')->nullable()->unsigned();
            $table->foreign('draft_parent_id')->references('id')->on($user_table)->onDelete('cascade');

            // It's recommended to replace your current unique constraint and add published field to it.

            // Example:  $table->dropUnique("your_unique_index_name");
            //           $table->unique(['your_unique_fields', 'published'], "example_unique_name_with_published_field_added");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
