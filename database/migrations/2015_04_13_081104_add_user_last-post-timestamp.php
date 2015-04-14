<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserLastPostTimestamp extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->timestamp('last_post');
		});
		
		Schema::table('posts', function(Blueprint $table) {
			$table->dropColumn('image_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->dropColumn('last_post');
		});
		
		Schema::table('posts', function(Blueprint $table) {
			$table->integer('image_id');
		});
	}

}
