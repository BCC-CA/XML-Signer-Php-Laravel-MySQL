@extends('user.master')

{{-- @section('meta_author', 'S. M. Abrar Jahin')
 --}}

@section('content')

	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Leave Application List</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-success" href="{{ route('leaves.create') }}"> Create New Application</a>
			</div>
		</div>
	</div>

	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif

	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Date</th>
			<th width="280px">Action</th>
		</tr>
		@foreach ($leaves as $leave)
		<tr>
			<td>{{ ++$i }}</td>
			<td>{{ $leave->name }}</td>
			<td>
				{{ \Carbon\Carbon::parse($leave->leave_start)->format('d/m/Y')}}
				to
				{{ \Carbon\Carbon::parse($leave->leave_end)->format('d/m/Y')}}
			</td>
			<td>
				<form action="{{ route('leaves.destroy',$leave->id) }}" method="POST">

					<a class="btn btn-info" href="{{ route('leaves.show',$leave->id) }}">Show</a>
					{{--
					<a class="btn btn-primary" href="{{ route('leaves.edit',$leave->id) }}">Edit</a>
					--}}
					<a class="btn btn-primary sign_file" file_id="{{ $leave->id }}" url="{{ route('api.download',['id'=>$leave->id,'token'=>'token_not_implemented']) }}">Sign</a>

					@csrf
					@method('DELETE')
	  
					<button type="submit" class="btn btn-danger">Delete</button>
				</form>
			</td>
		</tr>
		@endforeach
	</table>
  
	{!! $leaves->links() !!}
	  
@endsection