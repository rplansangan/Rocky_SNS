<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UserType extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $t) {
			$t->boolean('is_foundation')->default(0);
			$t->boolean('is_member')->default(0);
		});
		DB::statement('ALTER TABLE `sns_users` MODIFY `sns_users`.`is_merchant` tinyint(1) DEFAULT 0');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $t) {
			$t->removeColumn('is_foundation');
			$t->removeColumn('is_member');
		});
	}

}
