<?php

namespace App\Http\Controllers;

use App\User;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('frontend.users.dashboard');
    }

    public function change_account(Request $request){
        if($request->method() == 'GET'){
            return view('frontend.users.change_account');
        }else{
            if ($request->selector){
                if ($request->selector == 'name'){
                    $user = User::find(Auth::id());
                    $user->name = $request->name;
                    $user->save();
                    $message = 'anun@ poxvec';
                }
                if ($request->selector == 'phone'){
                    $user = User::find(Auth::id());
                    $user->phone = $request->phone;
                    $user->save();
                    $message = 'Heraxos@ poxvec';
                }
                return back()->with(['alert' => true, 'message' => $message]);
            }
        }
    }
}
