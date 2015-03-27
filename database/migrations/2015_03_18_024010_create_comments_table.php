<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('comment_id');
			$table->integer('post_id');
			$table->mediumText('comment_message');
			$table->integer('comment_user_id');
			$table->softDeletes();
			$table->timestamps();
			
			$table->index('post_id');
			$table->index('comment_user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
