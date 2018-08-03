<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use App\Notifications\EmailVerificationNotification;
use App\Model\User;
use App\Exceptions\InvalidRequestException;

class EmailVerificationController extends Controller
{
    public function verify(Request $request)
    {
    	$email=$request->get('email');
    	$token=$request->get('token');

    	// empty exceptions

    	if(!$email || !$token){
    		throw new InvalidRequestException('token is error or email empty');
    	}

    	if($token !=Cache::get('email_verification_'.$email)){
    		throw new InvalidRequestException('email empty or call time');
    	}


    	if(!$user=User::where('email',$email)->first()){
    		throw new InvalidRequestException('User empty');
    	}


    	Cache::forget('email_verification_'.$email);

    	$user->update(['email_verified' => true]);

    	return view('pages.success',['msg'=>'email check sucess!']);
    }

    public function send(Request $request)
    {
    	$user =$request->user();

    	if($user->email_verified){
    		throw new InvalidRequestException("user email verify!");
    	}

    	$user->notify(new EmailVerificationNotification());

    	return view('pages.success',['msg'=>'email send success']);
    }
}
