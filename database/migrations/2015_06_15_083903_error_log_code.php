<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ErrorLogCode extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('error_logs', function(Blueprint $t) {
            $t->tinyInteger('error_code')->nullable();;
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('error_logs', function(Blueprint $t) {
            $t->dropColumn(['error_code']);
		});
	}

}
