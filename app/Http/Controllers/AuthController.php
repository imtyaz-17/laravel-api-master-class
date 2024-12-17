<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;
    public function login(LoginUserRequest $request)
    {
        $request->validated($request->all());
        if (!Auth::attempt($request->only('email','password'))){
            return $this->error('Invalid Credentials', 401);
        }
        $user = User::firstWhere('email',$request->email);
        return $this->success(
            'Authenticated',
            [
                'token'=>$user->createToken('API token for' .$user->email)->plainTextToken
            ]
        );
    }
}
