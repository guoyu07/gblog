<?php

namespace App\Http\Controllers\Home;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests\SiginInRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * User Controller
 *
 */
class UserController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    /**
     * Sigin User -- Home
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function sigin(SiginInRequest $request)
    {
        $validator = Validator::make($request->only('username'), [
            'username' => 'email',
        ]);

        $attempts = [
            'email' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if ($validator->fails()) {
            unset($attempts['email']);
            $attempts['mobile'] = $request->input('username');
        }

        if (Auth::guard()->attempt(
            $attempts, 
            $request->input('remember'))
        ) {

            return response()->success();
        }

        return response()->error('User name or Password error');
    }
}
