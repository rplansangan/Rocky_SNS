<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('post_id');
			$table->mediumText('post_message');
			$table->integer('user_id');
			$table->char('post_tags', 100);
// 			$table->char('post_slug', 3);
			$table->integer('image_id');
			$table->softDeletes();
			$table->timestamps();
			
			$table->index('user_id');
			$table->index('image_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
