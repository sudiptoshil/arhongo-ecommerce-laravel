<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductSubcategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_subcategory', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('category_id');
			$table->string('subcategory_name', 30);
			$table->string('sub_cat_image')->nullable();
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
		Schema::drop('product_subcategory');
	}

}
