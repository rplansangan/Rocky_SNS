<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPetFoundation extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pet_foundations', function(Blueprint $t) {
			$t->string('mission_statement', 3000);
			$t->string('vision_statement', 3000);
			$t->string('goal_statement', 3000);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pet_foundations', function(Blueprint $t) {
			$t->dropColumn(array('mission_statement', 'vision_statement', 'goal_statement'));
		});
	}

}
