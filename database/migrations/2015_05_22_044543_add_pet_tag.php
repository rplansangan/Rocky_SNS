<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPetTag extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pets', function(Blueprint $t) {
			$t->string('rocky_tag_no', 50);
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
			$t->dropColumn(['rocky_tag_no']);
		});
	}

}
