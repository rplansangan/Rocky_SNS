<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMentionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mentions', function(Blueprint $table)
		{
			$table->increments('mention_id');
			$table->integer('post_id');
			$table->integer('comment_id');
			$table->softDeletes();
			$table->timestamps();
			
			$table->index('post_id');
			$table->index('comment_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mentions');
	}

}
