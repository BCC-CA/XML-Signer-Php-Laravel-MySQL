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
			<th>Details</th>
			<th width="280px">Action</th>
		</tr>
		@foreach ($leaves as $leave)
		<tr>
			<td>{{ ++$i }}</td>
			<td>{{ $leave->name }}</td>
			<td>{{ $leave->detail }}</td>
			<td>
				<form action="{{ route('leaves.destroy',$product->id) }}" method="POST">

					<a class="btn btn-info" href="{{ route('leaves.show',$product->id) }}">Show</a>
	
					<a class="btn btn-primary" href="{{ route('leaves.edit',$product->id) }}">Edit</a>
   
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