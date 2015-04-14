<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateNewsfeedViewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
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
			UNION 

			SELECT 
				`sns_posts`.`post_id` AS `post_id`,
				`sns_posts`.`user_id` AS `post_user_id`, 
				`sns_posts`.`user_id` AS `user_id`,
				0 AS `friend_user_id`,
				`sns_posts`.`created_at` AS `created_at`,
				`sns_posts`.`deleted_at` AS `deleted_at` 
			FROM `sns_posts`
		');
// 		select 
// 			`sns_posts`.`post_id` AS `post_id`,
// 			`sns_posts`.`post_message` AS `post_message`,
// 			`sns_user_friends`.`user_id` AS `user_id`,
// 			`sns_user_friends`.`friend_user_id` AS `friend_user_id`,
// 			`sns_posts`.`created_at` AS `created_at`,
// 			`sns_posts`.`updated_at` AS `updated_at`,
// 			`sns_posts`.`deleted_at` AS `deleted_at`
// 		from (
// 			`sns_posts`
// 		join
// 			 `sns_user_friends` 
// 		on((
// 			`sns_user_friends`.`friend_user_id` = `sns_posts`.`user_id`
// 		)))
		
// 		union
		
// 		select 
// 			`sns_posts`.`post_id` AS `post_id`,
// 			`sns_posts`.`post_message` AS `post_message`,
// 			`sns_posts`.`user_id` AS `user_id`,
// 			0 AS `friend_user_id`,
// 			`sns_posts`.`created_at` AS `created_at`,
// 			`sns_posts`.`updated_at` AS `updated_at`,
// 			`sns_posts`.`deleted_at` AS `deleted_at` 
// 		from 
// 			`sns_posts`
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('DROP VIEW sns_newsfeed');
	}

}
