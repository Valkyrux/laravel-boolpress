<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')
                ->nullable();
            $table->foreign('user_id')->constrained()
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->unsignedBigInteger('category_id')
                ->nullable();
            $table->foreign('category_id')->constrained()
                ->references('id')
                ->on('categories')
                ->onDelete('set null');

            $table->string('title', 240);
            $table->text('content');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_user_id_foreign');
            $table->dropForeign('posts_category_id_foreign');
        });

        Schema::dropIfExists('posts');
    }
}
