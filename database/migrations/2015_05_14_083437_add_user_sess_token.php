<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserSessToken extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $t) {
			$t->string('session_token', 255)->nullable();
			$t->string('user_token', 255)->nullable();
			$t->integer('socket_id')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $t) {
			$t->dropColumn('session_token');
			$t->dropColumn('user_token');
			$t->dropColumn('socket_id');
		});
	}

}
