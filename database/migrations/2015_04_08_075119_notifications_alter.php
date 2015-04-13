<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class NotificationsAlter extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('notifications', function(Blueprint $table) {
			$table->renameColumn('from_user_id', 'origin_user_id');
			$table->dropColumn(array('origin_object', 'origin_id', 'destination_object', 'destination_id'));
			$table->integer('destination_user_id');
			$table->string('notification_object');
		
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('notifications', function(Blueprint $table) {
			$table->renameColumn('origin_user_id', 'from_user_id');
			$table->integer('origin_id');
			$table->string('origin_object', 50);
			$table->integer('destination_id');
			$table->string('destination_object', 50);
			$table->dropColumn(array('destination_user_id', 'notification_object'));
		});
	}

}
