<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('friend_requests', function(Blueprint $table)
		{
			$table->increments('request_id');
			$table->mediumText('request_message');
			$table->integer('requesting_user_id');
			$table->integer('requested_user_id');
			$table->char('status', 1);
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
		Schema::drop('friend_requests');
	}

}
