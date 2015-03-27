<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags', function(Blueprint $table)
		{
			$table->increments('tag_id');
			$table->integer('post_id');
			$table->integer('tagged_user_id');
			$table->tinyInteger('is_untagged');
			$table->softDeletes();
			$table->timestamps();
			
			$table->index('post_id');
			$table->index('tagged_user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tags');
	}

}
