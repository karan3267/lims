<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tests', function(Blueprint $table)
		{
            $table->increments('id');
			$table->integer('parent_id')->nullable();
			$table->string('name')->nullable();
			$table->string('shortcut')->nullable();
			$table->string('sample_type')->nullable();
			$table->string('unit')->nullable();
			$table->text('reference_range')->nullable();
			$table->text('type')->bullable();
			$table->boolean('separated')->default(0);
			$table->double('price')->default(0);
			$table->boolean('status')->default(0);
			$table->boolean('title', 1)->nullable()->default(0);
			$table->text('precautions')->nullable();
            $table->timestamps();
			$table->softDeletes();
			$table->string('doc_code')->unique()->nullable();
            $table->integer('revision')->default(1);
            $table->string('prepared_by')->nullable();
            $table->string('approved_by')->nullable();
            $table->enum('received_package_condition', ['satisfactory', 'unsatisfactory'])->nullable();
            $table->enum('type_of_sampling', ['routine', 'non-routine', 'investigation'])->nullable();
            $table->dateTime('date_and_time_of_sample_received')->nullable();
            $table->decimal('temperature_observed_when_received', 8, 2)->nullable();
            $table->string('verified_by')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('analyses');
	}

}
