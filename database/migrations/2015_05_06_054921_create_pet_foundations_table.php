<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetFoundationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pet_foundations', function(Blueprint $table)
		{
			$table->increments('petfoundation_id');
			$table->integer('user_id');
			$table->string('petfoundation_name', 100);
			$table->string('address_line1', 255);
			$table->string('address_line2', 255);
			$table->string('city', 100);
			$table->string('zip', 10);
			$table->string('state', 3);
			$table->string('country', 3);
			$table->integer('phone_country_code');
			$table->integer('phone_area_code');
			$table->integer('phone_number');
			$table->integer('contact_person');
			$table->string('email_address', 100);
			$table->string('petfoundation_background', 1000);
			$table->integer('banner_image_id');
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
		Schema::drop('pet_foundations');
	}

}
