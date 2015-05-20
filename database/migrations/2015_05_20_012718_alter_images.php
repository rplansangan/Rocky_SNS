<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterImages extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('images', function(Blueprint $t) {
			$t->string('description', 255);
			$t->integer('project_id');
			$t->integer('pfa_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('images', function(Blueprint $t) {
			$t->dropColumn(array('description', 'project_id', 'pfa_id'));
		});
	}

}
