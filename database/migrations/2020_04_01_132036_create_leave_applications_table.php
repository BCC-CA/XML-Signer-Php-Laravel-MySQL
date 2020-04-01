<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveApplicationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leave_applications', function (Blueprint $table) {
			$table->id();

			$table->unsignedBigInteger('applicant_id');
			$table->foreign('applicant_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

			$table->string('name');
			$table->enum('designation', ['IT Officer', 'Admin', 'Account Officer']);
			$table->date('leave_start');
			$table->date('leave_end');
			$table->enum('leave_type', ['Annual Leave', 'Home Leave', 'Special Leave', 'Maternity Leave', 'Sick Leave']);

			$table->text('purpose_of_leave');
			$table->text('address_during_leave');
			$table->string('phone_no');

			$table->unsignedBigInteger('sign_id')->default(null);
			//$table->foreign('sign_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

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
		Schema::dropIfExists('leave_applications');
	}
}