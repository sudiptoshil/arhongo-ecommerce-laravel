<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('order_id');
			$table->integer('product_id');
			$table->integer('product_quantity');
			$table->integer('vendor_id');
			$table->float('product_unite_price', 10, 0);
			$table->float('unit_x_quantity_price', 10, 0)->nullable();
			$table->string('invoice_type', 30)->nullable();
			$table->boolean('to_delivery')->nullable()->comment('delivery status	');
			$table->timestamps();
			$table->date('date')->nullable();
			$table->integer('status')->default(1);
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
		Schema::drop('invoice');
	}

}
