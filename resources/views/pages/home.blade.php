@extends('layouts.master')

@section('content')

@if(Session::has('success'))
	<div class="alert alert-success">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		{{ Session::get('success')}}
	</div>
@endif

<div class="row centered-form">
	<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Sign Up!</h3>
			</div>
			<div class="panel-body">

				{!! Form::open() !!}
					@include('partials/_form', ['username'=>null, 'email'=>null, 'phone'=>null, 'submitButtonText'=>'Register'])
				{!! Form::close() !!}

			</div>
		</div>
	</div>
</div>

@stop