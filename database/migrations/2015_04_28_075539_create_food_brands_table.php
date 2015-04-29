<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodBrandsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('food_brands', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('brand_name', 100);
			$table->string('particulars', 250);
			$table->integer('animal_type_id');
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
		Schema::drop('food_brands');
	}

}
