<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function index(){

    }
    public function show(){

    }
    public function create(User $user){
        return view("users.create",["user"=>$user]);
    }
    public function store(Request $request){
$userForm = $request->validate([
    "name"=>["required","min:3"],
    "email"=>["required","email",Rule::unique('users','email')],
    "password"=>"required|confirmed|min:4"

]);
$userForm['password']= bcrypt($userForm['password']);
  $user= User::create($userForm);
  auth()->login($user);
  return redirect('/')->with("message","user is succesfully logged in");
    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/")->with('message', "you have succesfully logged out ");
    }
    public function login(Request $request, User $users){
        return view("users.login");
    }
    public function authenticate(Request $request, User $users){
        $userForm = $request->validate([
            "email"=>["required","email"],
            "password"=>"required"
        
        ]);
        if(auth()->attempt($userForm)){
            $request->session()->regenerate();
            return redirect("/")->with("message","succesfully logged in");
        }
        return back()->withErrors(["email"=>"Invalid password or email"]);
    }
}
