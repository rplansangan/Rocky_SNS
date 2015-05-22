<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoundPetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('found_pets', function(Blueprint $table)
		{
			$table->increments('found_id');
			$table->string('rocky_tag_no', 50);
			$table->boolean('is_guest');
			$table->integer('user_id');
			$table->string('found_in_remark', 3000);
			$table->string('finder_address1', 100);
			$table->string('finder_address2', 100);
			$table->string('finder_city', 25);
			$table->integer('finder_country_code');
			$table->integer('finder_area_code');
			$table->integer('finder_tel_no');
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
		Schema::drop('found_pets');
	}

}
