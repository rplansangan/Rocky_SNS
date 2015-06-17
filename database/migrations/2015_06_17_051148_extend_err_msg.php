<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ExtendErrMsg extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('ALTER TABLE `sns_error_logs` MODIFY `sns_error_logs`.`error_msg` text(1000)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        DB::statement('ALTER TABLE `sns_error_logs` MODIFY `sns_error_logs`.`error_msg` varchar(255)');
	}

}
