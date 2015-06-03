<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFoundPets extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('found_pets', function(Blueprint $t) {
			$t->dropColumn(['finder_address1', 'finder_address2', 'finder_city']);
			$t->string('found_in_address1', 100);
			$t->string('found_in_address2', 100);
			$t->string('found_in_city', 50);
			$t->string('found_in_country', 50);
			$t->string('found_in_state', 50);
			$t->integer('found_in_zip');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('found_pets', function(Blueprint $t) {
			$t->dropColumn(['found_in_address1', 'found_in_address2', 'found_in_city', 'found_in_country', 'found_in_state', 'found_in_zip']);
			$t->string('finder_address1', 100);
			$t->string('finder_address2', 100);
			$t->string('finder_city', 25);
		});
	}

}
