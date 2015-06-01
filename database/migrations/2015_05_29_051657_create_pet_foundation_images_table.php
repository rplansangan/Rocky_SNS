<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetFoundationImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pet_foundation_images', function(Blueprint $table)
		{
			$table->increments('image_id');
			$table->integer('user_id');
			$table->integer('foundation_id');
			$table->integer('adoption_id');
			$table->string('image_path', 100);
			$table->string('image_name', 100);
			$table->string('image_title', 100);
			$table->string('image_mime', 30);
			$table->string('image_ext', 15);
			$table->string('image_desc', 1000)->nullable();
			$table->boolean('is_profile_picture');
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
		Schema::drop('pet_foundation_images');
	}

}
