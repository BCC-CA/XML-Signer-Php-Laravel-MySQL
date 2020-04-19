@extends('user.master')

{{-- @section('meta_author', 'S. M. Abrar Jahin')
 --}}

@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Add New Leave Application</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-primary" href="{{ route('leaves.index') }}"> Back</a>
		</div>
	</div>
</div>
   
@if ($errors->any())
	<div class="alert alert-danger">
		<strong>Whoops!</strong> There were some problems with your input.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<form action="{{ route('leaves.store') }}" method="POST">
	@csrf

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label asp-for="name" class="control-label"></label>
				<input type="text" name="name" class="form-control" autocomplete="off" placeholder="Name" required/>
				{{--
				Should show prevous value and error in here
				<span asp-validation-for="name" class="text-danger"></span>
				--}}
			</div>
			<div class="form-group">
				<label asp-for="Designation" class="control-label"></label>
				<select name="designation" class="form-control" required>
					<option disabled selected>-- Please Select Your Designation --</option>
					<option value="IT Officer">IT Officer</option>
					<option value="Admin">Admin</option>
					<option value="Account Officer">Account Officer</option>
				</select>
			</div>
			<div class="form-group">
				<label asp-for="LeaveStart" class="control-label"></label>
				<input type="text" readonly="true" name="leave_start" autocomplete="off" placeholder="Leave Start Date" class="DatePicker form-control" id="start_date" required/>
			</div>
			<div class="form-group">
				<label asp-for="LeaveEnd" class="control-label"></label>
				<input type="text" readonly="true" name="leave_end" autocomplete="off" placeholder="Leave End Date" class="DatePicker form-control" id="end_date" required/>
			</div>
			<div class="form-group">
				<label asp-for="LeaveType" class="control-label"></label>
				<select class="form-control" required>
					<option disabled selected>-- Please Select a Leave Type --</option>
					<option value="Annual Leave">Annual Leave</option>
					<option value="Home Leave">Home Leave</option>
					<option value="Special Leave">Special Leave</option>
					<option value="Maternity Leave">Maternity Leave</option>
					<option value="Sick Leave">Sick Leave</option>
				</select>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label asp-for="PurposeOfLeave" class="control-label"></label>
				<textarea name="purpose_of_leave" class="form-control" rows="5" placeholder="Purpose of leave" required></textarea>
			</div>
			<div class="form-group">
				<label asp-for="AddressDuringLeave" class="control-label"></label>
				<textarea name="address_during_leave" class="form-control" rows="4" placeholder="Address During leave" required></textarea>
			</div>
			<div class="form-group">
				<label asp-for="PhoneNoDuringLeave" class="control-label"></label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">+88</span>
					</div>
					<input name="phone_no" class="form-control" type="tel" required/> {{-- pattern="0[1-9]{3}-[0-9]{3}-[0-9]{3}" --}}
				</div>
			</div>
			
		</div>

		<div class="col-md-6 col-centered">
			<div class="form-group">
				<input type="submit" value="Submit Application" class="btn btn-primary" />
			</div>
		</div>
	</div>

</form>
@endsection