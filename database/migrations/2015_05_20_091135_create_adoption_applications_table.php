<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdoptionApplicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adoption_applications', function(Blueprint $table)
		{
			$table->increments('application_id');
			$table->integer('adoption_id');
			$table->integer('user_id');
			$table->string('application_note', 1000);
			$table->string('status', 10);
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adoption_applications');
	}

}
