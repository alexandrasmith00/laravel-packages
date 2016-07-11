<?php namespace LexiSmith\LaravelRefer;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
 
class ReferralController extends Controller
{
	
    public function index()
    {
				Session::put('referral_code', Input::get('ref'));
				return view('referral::signup');
    }
	
		public function submit(Request $request)
		{
				// get session variable containing referral code
				if (Session::has('referral_code'))
				{
					// if a referral code exists, move that person up!
				}
			
				$validator = Validator::make($request->all(), [ 
					'email' => 'required|email|unique:referrals'
				]);
			
				if ($validator->fails())
				{
						$failed = array_keys($validator->failed()['email']);
					
						// is empty or invalid email address
						if (in_array("Required", $failed) || in_array("Email", $failed))
							return redirect()->back()->with('error', 'Please enter a valid email.');
								
						// already in the 
						if (in_array("Unique", $failed))
						{
								Session::flash('title', "We've got you!");
								Session::flash('message', "You're already on the list.");
						}
				}

			
				// now add the person signing up
				//check for email
			
				// check if already in database

			
				Session::flash('title', "Thank you!");
				Session::flash('message', "We have added your email address to the signup queue.");
		
		}
	
		public function lookup ($email)
		{
//			 return view with lookup info
		}
}