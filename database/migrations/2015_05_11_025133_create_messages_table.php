<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table)
		{
			$table->increments('message_id');
			$table->integer('user_id');
			$table->integer('for_user_id');
			$table->integer('image_id');
			$table->mediumText('message');
			
			$table->softDeletes();
			$table->timestamps();
			
			$table->index('message_id');
			$table->index('user_id');
			$table->index('for_user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('messages');
	}

}
