<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AlterUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $t) {
			$t->renameColumn('role_id', 'user_role');
		});
		DB::statement('ALTER TABLE sns_users MODIFY user_role int(4)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('ALTER TABLE sns_users MODIFY user_role char(5)');
		Schema::table('users', function(Blueprint $t) {
			$t->renameColumn('user_role', 'role_id');
		});
	}

}
