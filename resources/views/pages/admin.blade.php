@extends('layouts.master')

@section('content')

@if(Session::has('success'))
	<div class="alert alert-success">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		{{ Session::get('success')}}
	</div>
@endif

<div class="text-muted">
	<h2>Admin Panel</h2>
</div>

<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Username</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>

		@if ( !$users->count() )
			There are no users
		@else
			@foreach( $users as $user )
				<tr>
					<td class="col-md-4">{{ $user->username }}</td>
					<td class="col-md-2">{{ $user->phone }}</td>
					<td class="col-md-5">{{ $user->email }}</td>
					<td class="col-md-1" align='center'>
						<a href="{{ route('admin.edit', [$user->id]) }}">
							{!! HTML::image('/images/edit.png', 'edit '.$user->id, array('width'=>15, 'height'=>15)) !!}
						</a></td>
					<td class="col-md-1" align='center'>
						{!! Form::open(['method' => 'DELETE', 'route' => ['admin.destroy', $user->id]]) !!}				
							{!! Form::image('/images/delete.png', 'delete '.$user->id, array('width'=>15,'height'=>15)) !!}
						{!! Form::close() !!}
					</td>				
				</tr>
			@endforeach
		@endif
	</table>
</div>

@stop
