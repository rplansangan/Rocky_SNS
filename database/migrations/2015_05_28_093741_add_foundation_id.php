<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFoundationId extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pet_adoptions', function(Blueprint $t) {
			$t->integer('foundation_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pet_adoptions', function(Blueprint $t) {
			$t->dropColumn(['foundation_id']);
		});
	}

}
