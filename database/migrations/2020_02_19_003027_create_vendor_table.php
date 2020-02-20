<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVendorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vendor', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('username', 11);
			$table->text('password', 65535);
			$table->string('email', 30);
			$table->string('phone', 11);
			$table->text('location', 65535);
			$table->text('email_verification', 65535);
			$table->string('nid', 20);
			$table->boolean('active');
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
		Schema::drop('vendor');
	}

}
