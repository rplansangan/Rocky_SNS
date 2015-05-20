<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeterinarianBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('veterinarian_bookings', function(Blueprint $table)
		{
			$table->increments('booking_id');
			$table->dateTime('date_time');
			$table->string('status');
			$table->integer('vet_id');
			$table->integer('user_id');
			$table->string('particulars');
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
		Schema::drop('veterinarian_bookings');
	}

}
