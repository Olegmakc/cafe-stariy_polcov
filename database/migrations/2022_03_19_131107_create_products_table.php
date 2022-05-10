<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function (Blueprint $table) {
			$table->id()->autoIncrement();
			$table->foreignId('category_id')->cascadeOnDelete();;
			$table->string('title');
			$table->text('description');
			$table->integer('weight');
			$table->string('photo');
			$table->double('price');
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
		Schema::dropIfExists('products');
	}
};
