<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('user_id');
			$table->string('email_address', 100)->unique();
			$table->string('password', 100);
			$table->char('role_id', 5);
			$table->char('is_merchant', 1);
			$table->boolean('is_deactivated');
			$table->boolean('is_validated');
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
