<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('customer_id');
			$table->string('transaction_id')->nullable();
			$table->integer('order_type')->nullable()->comment('1=cash on delivery; 2 = Bkash');
			$table->string('coupon', 100)->nullable();
			$table->integer('total_cost');
			$table->integer('payment_method');
			$table->string('delivery_location');
			$table->integer('status')->default(1)->comment('1 = pending; 2=accepted; 3=cancelled');
			$table->boolean('delivered');
			$table->timestamps();
			$table->date('date');
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
		Schema::drop('orders');
	}

}
