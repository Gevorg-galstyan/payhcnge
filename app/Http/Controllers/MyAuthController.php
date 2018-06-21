<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MyAuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|min:9|max:12',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        $orders = Order::where('email', $user->email)->orWhere('phone', $user->phone)->get();
        if ($orders->count()) {
            foreach($orders as $order){
                $order->user_id = $user->id;
                $order->save();
            }
        }
        if ($user) {
            Auth::login($user);
        }
        return redirect()->route('home');

    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->with(['alert' => true, 'message' => 'sxal mutqanun kam gaxtnabar']);
        }
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password, 'bloc' => 0])) {
            return redirect()->route('home');
        }

        $test_user = User::where('email')->first();
        if ($test_user) {
            if (Hash::check($password, $test_user->password)) {

                if ($test_user->bloc == 1) {
                    return back()->with(['alert' => true, 'message' => 'dzer account@ bloke @nkac ']);
                }
            }
        }
        return back()->with(['alert' => true, 'message' => 'sxal mutqanun kam gaxtnabar']);
    }
}
