<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('type_id')->default(0);
			$table->integer('category_id');
			$table->integer('subcategory_id')->default(0);
			$table->integer('brand_id');
			$table->integer('vendor_id');
			$table->string('product_name', 50);
			$table->text('product_description', 65535);
			$table->float('display_price', 10, 0);
			$table->string('sell_unit', 10)->default('0');
			$table->integer('product_quantity')->default(0);
			$table->integer('discount')->nullable()->default(0);
			$table->boolean('sc')->default(0);
			$table->string('currency', 10);
			$table->integer('sell_status')->default(1)->comment('1=sellable,2=sold');
			$table->integer('status')->default(1)->comment('1=active,2=inactive');
			$table->text('img', 65535);
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
		Schema::drop('product');
	}

}
