<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registrations', function(Blueprint $table)
		{
			$table->increments('registration_id');
			$table->string('last_name', 100);
			$table->string('first_name', 100);
			$table->timestamp('birth_date');
			$table->char('gender', 1);
			$table->string('address_line1', 100);
			$table->string('address_line2', 100);
			$table->string('city', 100);
			$table->string('zip', 10);
			$table->string('state', 3);
			$table->string('country', 3);
			$table->tinyInteger('phone_country_code');
			$table->tinyInteger('phone_area_code');
			$table->tinyInteger('phone_number');
			$table->string('alias', 50);
			$table->string('email_address', 100);
			$table->timestamp('last_deactivated');
			$table->timestamp('last_profile_update');
			$table->integer('user_id');
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
		Schema::drop('registrations');
	}

}
