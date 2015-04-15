<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class SnsNewsfeedV2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('DROP VIEW sns_newsfeed');
		
		DB::statement('
			CREATE VIEW `sns_newsfeed` AS 
			SELECT
				`sns_posts`.`post_id` AS `post_id`,
				`sns_posts`.`user_id` AS `post_user_id`, 
				`sns_user_friends`.`user_id` AS `user_id`,
				`sns_user_friends`.`friend_user_id` AS `friend_user_id`,
				`sns_posts`.`created_at` AS `created_at`,
				`sns_posts`.`deleted_at` AS `deleted_at`
			FROM 
				`sns_posts` 
			INNER JOIN
				 `sns_user_friends` 
			ON 
				`sns_user_friends`.`friend_user_id` = `sns_posts`.`user_id` 
			WHERE `sns_posts`.`advertise_id` = 0
			UNION 

			SELECT 
				`sns_posts`.`post_id` AS `post_id`,
				`sns_posts`.`user_id` AS `post_user_id`, 
				`sns_posts`.`user_id` AS `user_id`,
				0 AS `friend_user_id`,
				`sns_posts`.`created_at` AS `created_at`,
				`sns_posts`.`deleted_at` AS `deleted_at` 
			FROM `sns_posts`
			WHERE `sns_posts`.`advertise_id` = 0
		');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
	}

}
