<?php namespace LexiSmith\LaravelRefer;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator, DB;
 
class ReferralController extends Controller
{
	
    public function index()
    {
				Session::put('referral_code', Input::get('ref'));
				return view('referral::signup');
    }
	
		public function submit(Request $request)
		{
				// if a referral code exists, move that person up!
				if (Session::has('referral_code'))
				{
					$previous_spot = DB::table('referrals')->where('referral_code', Session::get('referral_code'))->first()->spot;
					
					$new_spot = $previous_spot - config('refer.jump');
					if ($new_spot <= 0)
						$new_spot = 1;
					
					$updated = DB::table('referrals')->where('referral_code', Session::get('referral_code'))->update(['spot' => $new_spot]);
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
								
						// already in the referral database
						if (in_array("Unique", $failed))
						{
								Session::flash('title', "We've got you!");
								Session::flash('message', "You're already on the list.");
								return $this->lookup(Input::get('email'));
						}
				}
				else {
					$this->add(Input::get('email'));
					Session::flash('title', "Thank you!");
					Session::flash('message', "We have added your email address to the signup queue.");
					return $this->lookup(Input::get('email'));
				}
		}
	
		public function add($email)
		{
			// get starting number -- either highest in DB or starting #
			$spot = DB::table('referrals')->orderBy('spot', 'DESC')->take(1)->first();
			if ($spot == null)
				$spot = config('refer.start');
			else
				$spot = $spot->spot + 1;

			// generate random referral code, check to make sure it is valid
			$existing_codes = DB::table('referrals')->lists('referral_code');
			$code = "";
			do {
				$code  = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, config('refer.code_length'));
			} while (in_array($code, $existing_codes));

			DB::table('referrals')->insert([
				'spot' => $spot, 
				'email' => $email, 
				'referral_code' => $code,
				'num_referrals' => 0
			]);
		}
	
		public function lookup ($email)
		{
				$referral = DB::table('referrals')->where('email', $email)->first();
				$referral->general_link =  config('app.url') . '/?ref=' . $referral->referral_code;
				$referral->twitter_link = 'hey';
				$referral->facebook_link = 'hey';
				$referral->linkedin_link = 'hey';
				
				return view('referral::lookup', compact('referral', 'referral'));
		}
}