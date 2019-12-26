<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Storage;
use App\User;

class RegisterApiController extends APIBaseController
{
    /**
     * Create a new user instance after a valid registration.
     * 
     * @Post('user/register')
     *
     * @param Request $request
     * @return User
     */
    public function register(Request $request)
    {
        \Log::info('Registration API');
        $validator = Validator::make($request->all(), [
            'name'         => 'required|string',   
            'email'         => 'required|string',   
            'password'      => 'required|string|min:6',

        ]);
        if ($validator->fails()) {
            return $this->respondBadRequest('Validation failed for parameters please review.', $validator->errors()->toArray());
        }

        $input = $request->all();
		$user = User::create([
            'name'          => $request->name,
            'email'          => $request->email,
			'password'          => bcrypt($input['password']),
            'type'              => $request->type,
            'api_token'         => str_random(60),
		]);
            return $this->respondCreated('User successfully registered', $user);

    }
   
}
