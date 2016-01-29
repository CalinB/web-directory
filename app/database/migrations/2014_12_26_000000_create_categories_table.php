<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			// These columns are needed for Baum's Nested Set implementation to work.
			// Column names may be changed, but they *must* all exist and be modified
			// in the model.
			// Take a look at the model scaffold comments for details.
			// We add indexes on parent_id, lft, rgt columns by default.
			$table->increments('id');
			$table->boolean('status')->default(0);			
			$table->integer('parent_id')->nullable();
			$table->integer('lft')->nullable()->index();
			$table->integer('rgt')->nullable()->index();
			$table->integer('depth')->nullable();
			$table->string('name')->unique();
			$table->string('slug')->unique();
			$table->string('path')->unique()->index();
			$table->text('description', 1000);
			$table->text('keywords', 1000);

			// Add needed columns here (f.ex: name, slug, path, etc.)
			// $table->string('name', 255);

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
		Schema::drop('categories');
	}

}
