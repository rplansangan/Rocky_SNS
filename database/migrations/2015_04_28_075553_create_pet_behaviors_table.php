<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetBehaviorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pet_behaviors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('animal_type_id');
			$table->string('behavior', 250);
			$table->string('particulars', 250);
			$table->integer('order');
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
		Schema::drop('pet_behaviors');
	}

}
