<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sliders', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('slider_title')->nullable();
			$table->string('slider_image');
			$table->text('content', 65535)->nullable();
			$table->integer('status')->nullable()->default(1)->comment('1 = active; 0 = deactive');
			$table->integer('trash')->default(0)->comment('1 = trash; 0 = not in trash');
			$table->integer('created_by');
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
		Schema::drop('sliders');
	}

}
