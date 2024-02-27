<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Throwable;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function auth(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string',
                'password' => 'required'
            ]);
            
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->messages());
            }

            $email = $request->email;
            $password = $request->password;

            $user = User::where('email', $email)->with(['role', 'language'])->first();

            if ($user) {
                $check_password = Hash::check($password, $user->password);

                if ($check_password) {
                    session()->put(['email' => $user->email, 'name' => $user->name, 'role' => $user->role->name, 'language' => $user->language->name]);
                    return redirect('dashboard')->with('success', 'Welcome');
                } else {
                    return redirect()->back()->with('error', 'Incorrect Password...');
                }
            } else {
                return redirect()->back()->with('error', 'Email id is incorrect');
            }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
