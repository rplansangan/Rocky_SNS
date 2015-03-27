<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pets', function(Blueprint $table)
		{
			$table->increments('pet_id');
			$table->integer('user_id');
			$table->string('pet_name', 100);
			$table->string('pet_type', 5);
			$table->string('breed', 5);
			$table->datetime('pet_bday', 10);
			$table->string('gender', 1);
			$table->string('food', 255);
			$table->string('likes', 255);
			$table->string('dislikes', 255);
			$table->tinyInteger('selected');
			$table->softDeletes();
			$table->timestamps();
			
			$table->index('user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pets');
	}

}
