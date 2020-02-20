<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblReviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_review', function(Blueprint $table)
		{
			$table->integer('review_id', true);
			$table->integer('customer_id');
			$table->integer('pid');
			$table->integer('rating');
			$table->text('text', 65535);
			$table->dateTime('date_time');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_review');
	}

}
