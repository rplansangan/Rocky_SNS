<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFoundationContact extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pet_foundations', function(Blueprint $t) {
			$t->dropColumn(['contact_person']);
		});
		Schema::table('pet_foundations', function(Blueprint $t) {
			$t->string('contact_person', 100);
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
