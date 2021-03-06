<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function(Blueprint $table)
		{
			$table->increments('image_id');
			$table->integer('user_id');
			$table->string('image_path', 100);
			$table->string('image_name', 100);
			$table->string('image_title', 100);
			$table->string('image_mime', 30);
			$table->string('image_ext', 15);
			$table->boolean('is_profile_picture');
			$table->integer('post_id');
			$table->integer('business_id');
			$table->integer('advertise_id');
			$table->integer('pet_id');
			$table->softDeletes();
			$table->timestamps();
			
			$table->index('user_id');
			$table->index('post_id');
			$table->index('pet_id');
			$table->index('business_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('images');
	}

}
