<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveBusRegUnique extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('business_registration', function(Blueprint $t) {
			$t->dropColumn('business_name');
		});

		Schema::table('business_registration', function(Blueprint $t) {
			$t->text('business_name', 100);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('business_registration', function(Blueprint $t) {
			$t->text('business_name', 100);
		});
	}

}
