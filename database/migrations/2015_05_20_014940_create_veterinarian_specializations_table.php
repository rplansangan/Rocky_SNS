<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeterinarianSpecializationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('veterinarian_specializations', function(Blueprint $table)
		{
			$table->increments('vet_spec_id');
			$table->integer('user_id');
			$table->integer('specialization_id');
			$table->integer('vet_id');
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
		Schema::drop('veterinarian_specializations');
	}

}
