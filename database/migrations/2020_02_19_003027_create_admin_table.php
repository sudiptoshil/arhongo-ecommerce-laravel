<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('username', 50);
			$table->string('password', 50);
			$table->string('email', 50);
			$table->string('phone', 50)->nullable();
			$table->string('location')->nullable();
			$table->boolean('admin')->default(1);
			$table->boolean('logged_in')->nullable()->default(0);
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
		Schema::drop('admin');
	}

}
