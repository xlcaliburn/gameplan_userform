<div class="form-group">
	{!! Form::text('username', $username, array('class'=>'form-control input-sm', 'placeholder'=>'Username *')) !!}
</div>

<div class="form-group">
	{!! Form::text('phone', $phone, array('class'=>'form-control input-sm', 'placeholder'=>'Phone Number')) !!}
</div>

<div class="form-group">
	{!! Form::email('email', $email, array('class'=>'form-control input-sm', 'placeholder'=>'Email Address *')) !!}
</div>

{!! Form::submit($submitButtonText, array('class'=>'btn btn-info btn-block')) !!}