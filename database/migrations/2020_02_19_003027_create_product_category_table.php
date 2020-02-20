<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_category', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('root_id')->nullable()->default(0);
			$table->text('category_link', 65535);
			$table->integer('type_id')->nullable();
			$table->string('category_name', 20);
			$table->boolean('home_page')->default(0);
			$table->string('category_image')->nullable();
			$table->timestamps();
			$table->integer('trash');
			$table->integer('status')->default(1)->comment('1=active,2=inactive');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_category');
	}

}
