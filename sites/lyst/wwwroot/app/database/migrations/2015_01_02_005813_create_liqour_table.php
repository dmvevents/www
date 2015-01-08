<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiqourTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('liqour', function($table)
        {
            $table->increments('id');
            $table->string('brand')->unique();
            $table->string('type');
            $table->double('avg_price_per_ounce',13,2);
            $table->double('avg_price_per_ounce_std_dev',13,2);
            $table->double('avg_alcohol_per_by_vol',13,2);
            $table->double('avg_alcohol_per_by_vol_std_dev',13,2);
             $table->double('ounces',13,2);

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::drop('liqour');
	}

}
