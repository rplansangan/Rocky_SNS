<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailValidationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('email_validations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('registration_id');
			$table->string('hash');
			$table->softDeletes();
			$table->timestamps();
			
			$table->index('registration_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('email_validations');
	}

}
