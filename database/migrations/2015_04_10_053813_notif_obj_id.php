<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NotifObjId extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('notifications', function(Blueprint $table) {
			$table->integer('origin_object_id');
			$table->renameColumn('object_type', 'origin_object_type');
			$table->dropColumn('origin_user_id');
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
			$table->dropColumn('origin_object_id');
			$table->renameColumn('origin_object_type', 'object_type');
			$table->integer('origin_user_id');
		});
	}

}
