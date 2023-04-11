<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function createUser(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required | max:50',
            'email' => 'required | email | max:200 | unique:users',
            'password' => 'required | min:8',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $newUser = new User();
        $newUser->email = preg_replace('/\s+/', '', strtolower($request->email));
        $newUser->password = password_hash($request->password, PASSWORD_DEFAULT);
        $newUser->name = $request->name;
        $newUser->save();

        if($newUser) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
        }

        return true;
    }
}
