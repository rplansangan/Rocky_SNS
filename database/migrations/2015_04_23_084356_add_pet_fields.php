<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPetFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pets', function(Blueprint $t) {
			$t->string('food_style', 3);
			$t->string('brand', 5);
			$t->smallInteger('weight');
			$t->smallInteger('height');
			$t->string('behavior', 30);
			$t->string('feeding_interval', 3);
			$t->string('feeding_time', 100);
			$t->string('identifying_marks', 1000);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pets', function(Blueprint $t) {
			$t->removeColumn('food_style');
			$t->removeColumn('brand');
			$t->removeColumn('weight');
			$t->removeColumn('height');
			$t->removeColumn('behavior');
			$t->removeColumn('feeding_interval');
			$t->removeColumn('feeding_time');
			$t->removeColumn('identifying_marks');
		});
	}

}
