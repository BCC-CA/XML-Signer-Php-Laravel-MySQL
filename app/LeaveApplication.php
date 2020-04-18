<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'applicant_id',
		'name',
		'designation',
		'leave_start',
		'leave_end',
		'leave_type',
		'purpose_of_leave',
		'address_during_leave',
		'phone_no',
		'prev_file_id',
	];
}
