<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVetCoveredAnimalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vet_covered_animals', function(Blueprint $table)
		{
			$table->increments('animal_id');
			$table->integer('vet_id');
			$table->string('animal_type', 5);
			$table->string('particulars', 1000);
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
		Schema::drop('vet_covered_animals');
	}

}
