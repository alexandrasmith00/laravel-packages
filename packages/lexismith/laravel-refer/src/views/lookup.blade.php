<!-- if session has "just entered" -->
@if (Session::has('title'))
	<h3>{{ Session::get('title') }}</h3>
@endif

@if (Session::has('message'))
<b>{{ Session::get('message') }}</b>
@endif



<!-- show reservation info for session email -->
<h5><u>Reservation Info</u></h5>
<h4>{{ $referral->spot }}</h4> people ahead of you.
This reservation is held for <i>{{ $referral->email }}</i> Is this <a>not you?</a>


<!-- show recommendation links-->
<h3>Interested in priority access? </h3>
Get early access by referring your friends. The more friends that join, the sooner you'll get access.

<!--Twitter, Facebook, Email, Linkedin links-->

Or share this unique link:
<a>{{ $referral->general_link }}</a>