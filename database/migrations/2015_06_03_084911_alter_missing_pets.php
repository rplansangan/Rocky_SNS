<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMissingPets extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('missing_pets', function(Blueprint $t) {
			$t->string('lost_in_address1', 100);
			$t->string('lost_in_address2', 100);
			$t->string('lost_in_city', 50);
			$t->string('lost_in_state', 50);
			$t->string('lost_in_country', 50);
			$t->string('lost_in_remarks', 1000);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('missing_pets', function(Blueprint $t) {
			$t->dropColumn(['lost_in_address1', 'lost_in_address2', 'lost_in_city', 'lost_in_state', 'lost_in_country', 'lost_in_remarks']);
		});
	}

}
