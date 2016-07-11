<h4> This is the signup view. </h4>

@if (Session::has('error'))
	<span style="color: red;">{{ Session::get('error') }}</span>
@endif

{!! Form::open(['route' => 'submit_referral']) !!}    
	{!! Form::text('email', null, ['placeholder' => 'Enter email address']) !!}
	{!! Form::submit('Get Early Access'); !!}
{!! Form::close() !!}