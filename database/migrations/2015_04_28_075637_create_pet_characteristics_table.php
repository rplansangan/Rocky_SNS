<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetCharacteristicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pet_characteristics', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('pet_id');
			$table->integer('feeding_interval_id');
			$table->integer('pet_behavior_id');
			$table->integer('food_brand_id');
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
		Schema::drop('pet_characteristics');
	}

}
