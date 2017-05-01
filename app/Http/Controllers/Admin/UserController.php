<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    

	/**
	 * Get current logined user details 
	 * 
	 * @param  Request $request
	 * @return Response
	 */
    public function details(Request $request)
    {
    	return response()->success($request->user());
    }
}
