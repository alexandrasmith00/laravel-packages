<?php 

// Checks a link for verification
Route::get('/', '\LexiSmith\LaravelRefer\ReferralController@index')->name('refer');
Route::post('/', '\LexiSmith\LaravelRefer\ReferralController@submit')->name('submit_referral');

//// Default route to show the signup page
//Route::get('/', function () { 
//	return view('referral::signup'); 
//});

