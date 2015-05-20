<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeterinarySpecializationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('veterinary_specializations', function(Blueprint $table)
		{
			$table->increments('specialization_id');
			$table->string('description');
			$table->string('particulars');
			$table->integer('order');
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
		Schema::drop('veterinary_specializations');
	}

}
