<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
class CustomAuthController extends Controller
{
    public function user(){
        return "authh";

    }
    public function login(){
        return view("auth.login");

    }
    public function registration(){
        return view("auth.registration");
    }
    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|regex:/(.*)@sacemindustries.com/i|unique:users',
            'password'=>'required|min:8'
        ]);
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $res =$user->save();
        if($res){
            return back()->with('success','you have registered successfully');
        }else{
            return back()->with('fail','something wrong');
        }
    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email|regex:/(.*)@sacemindustries.com/i',
            'password'=>'required|min:8'
        ]);
        $user =User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('home');
            }else{
                return back()->with('fail','Password not matches.');

            }
   }else{
                return back()->with('fail','this email is not registered');
        }

    }
    public function home(){
        $data =array();
        if(session::has('loginId')){
            $data=User::where('id','=',session::get('loginId'))->first();
        }
        return view('Home',compact('data'));
    }
    public function logout(){
     if(session::has('loginId')){
       session::pull('loginId');
     return redirect('login');
     }
    }
}
