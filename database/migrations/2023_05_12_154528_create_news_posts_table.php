<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sub_category_id')->unsigned()->index();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->string('post_title');
            $table->text('post_detail');
            $table->text('post_photo');
            $table->integer('visitors');
            $table->integer('author_id');
            $table->integer('admin_id');
            $table->integer('is_share');
            $table->integer('is_comment');
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
        Schema::dropIfExists('news_posts');
    }
};
