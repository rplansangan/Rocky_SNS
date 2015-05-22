<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLostFoundPetImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lost_found_pet_images', function(Blueprint $table)
		{
			$table->increments('image_id');
			$table->integer('found_id');
			$table->integer('missing_id');
			$table->string('image_path', 100);
			$table->string('image_name', 100);
			$table->string('image_mime', 100);
			$table->string('image_ext', 100);
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
		Schema::drop('lost_found_pet_images');
	}

}
