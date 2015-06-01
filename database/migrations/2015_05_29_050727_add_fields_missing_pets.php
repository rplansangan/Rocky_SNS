<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsMissingPets extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('missing_pets', function(Blueprint $t) {
			$t->string('brand' , 100);
			$t->integer('owner');
			$t->string('food' , 100);
			$t->string('feed_interval' , 100);
			$t->string('feed_time' , 100);
			$t->string('lost_in' , 100);
			$t->string('pet_when' , 100);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
