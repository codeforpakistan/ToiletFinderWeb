<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Auth;

class LoginApiController extends APIBaseController
{
    /**
     * Authenticates the user
     *
     * @param Request $request contains all the data passed through the URI or the Form
     * @return User
     */
    public function login(Request $request)
    {
        \Log::info('Login API');
        $validator = Validator::make($request->all(), [
            'email'        => 'required|string|email|max:191',
            'password'     => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return $this->respondBadRequest('Validation failed for parameters please review.', $validator->messages());
        }
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password ]))
        {    
                    $user = Auth::user();
                    $user->save();

                    return $this->respondSuccess(Auth::user()->user_type . ' Successfully logged In', $user);

        }
        else
        {
            return $this->respondForbidden('Email or Password 0r User Id is Incorrect');
        }
    }
}
