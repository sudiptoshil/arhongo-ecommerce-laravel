<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->integer('customer_id', true);
			$table->string('full_name')->nullable();
			$table->string('user_name');
			$table->string('email')->nullable();
			$table->string('contact_no', 20);
			$table->string('national_id', 50)->nullable();
			$table->string('password', 50);
			$table->text('photo', 65535)->nullable();
			$table->text('present_address', 65535)->nullable();
			$table->text('permanent_address', 65535)->nullable();
			$table->integer('status')->default(1);
			$table->timestamps();
			$table->integer('trash')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}
