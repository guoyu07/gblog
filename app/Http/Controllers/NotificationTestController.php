<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use App\Mail\UserRegisterd;


class NotificationTestController extends Controller
{
	
    public function index()
    {
    	$user = new User();
    	$user->name = '接收人名字';
    	$user->email = '269530124@qq.com';

    	$when = \Carbon\Carbon::now()->addMinutes(2);

    	//User Object Or email address
    	Mail::to($user)->later($when, new UserRegisterd());
    	// Mail::to('269530124@qq.com')->send(new UserRegisterd());

    	return '<h1>Email Test</h1>';
    }
}
