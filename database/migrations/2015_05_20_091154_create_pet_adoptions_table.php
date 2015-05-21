<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetAdoptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pet_adoptions', function(Blueprint $table)
		{
			$table->increments('pa_id');			
			$table->string('pet_name', 50);
			$table->string('pet_type', 50);
			$table->string('breed', 50);
			$table->string('gender', 10);
			$table->string('height', 3);
			$table->string('weight', 5);
			$table->string('background', 100);
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
		Schema::drop('pet_adoptions');
	}

}
