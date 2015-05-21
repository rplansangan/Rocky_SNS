<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoundationProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('foundation_projects', function(Blueprint $table)
		{
			$table->increments('project_id');
			$table->integer('petfoundation_id');
			$table->string('project_description');
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
		Schema::drop('foundation_projects');
	}

}
