<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeterinarianRegistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('veterinarian_registrations', function(Blueprint $table)
		{
			$table->increments('vet_id');
			$table->integer('user_id');
			$table->string('license_number', 100);
			$table->string('clinic_address1', 255);
			$table->string('clinic_address2', 255);
			$table->string('clinic_city', 50);
			$table->string('clinic_state', 50);
			$table->string('clinic_country', 50);
			$table->integer('clinic_zip_code');
			$table->integer('clinic_phone_number');
			$table->integer('clinic_phone_area_code');
			$table->integer('clinic_phone_country_code');
			$table->string('clinic_email_address', 100);
			$table->string('particulars');
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
		Schema::drop('veterinarian_registrations');
	}

}
