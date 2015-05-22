<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissingPetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('missing_pets', function(Blueprint $table)
		{
			$table->increments('missing_id');
			$table->string('rocky_tag_no', 50);
			$table->string('pet_name', 50);
			$table->string('pet_type', 5);
			$table->string('breed', 55);
			$table->string('gender', 7);
			$table->smallInteger('weight');
			$table->smallInteger('height');
			$table->string('background', 1000);
			$table->string('pet_nickname', 50);
			$table->string('pet_donts', 1000);
			$table->string('pet_behavior', 255);
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
		Schema::drop('missing_pets');
	}

}
