<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserRegistrationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_registration', function(Blueprint $table)
		{
			$table->integer('reg_id', true);
			$table->integer('utype')->default(3)->comment('1=admin,2=reseller,3=user');
			$table->integer('status')->default(1);
			$table->integer('trash')->default(0);
			$table->string('mobile_no', 20)->nullable();
			$table->string('email', 50);
			$table->string('f_name', 50)->nullable();
			$table->string('l_name', 50);
			$table->text('password', 65535)->nullable();
			$table->text('pass_hash', 65535);
			$table->string('ref_id', 50)->nullable();
			$table->dateTime('date_time')->nullable();
			$table->text('address', 65535);
			$table->text('profile_image', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_registration');
	}

}
