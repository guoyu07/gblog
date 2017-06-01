<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');

            $table->string('title', 500)->index();
            $table->text('content');
            $table->text('content_origin');
            $table->text('description')->unllable();
            $table->string('banner', 255);

            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->foreign('user_id')->references('id')
            		->on('users')
            		->onDelete('cascade');

            $table->foreign('category_id')->references('id')
            		->on('categorys')
            		->onDelete('cascade');

            $table->softDeletes();
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
		Schema::disableForeignKeyConstraints();
		Schema::drop('posts');
	}

}
