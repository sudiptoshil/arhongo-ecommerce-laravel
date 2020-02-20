<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryManTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('delivery_man', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('username', 20);
			$table->string('phone', 20);
			$table->text('email', 65535);
			$table->text('email_verification', 65535);
			$table->boolean('active');
			$table->text('address', 65535);
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
		Schema::drop('delivery_man');
	}

}
