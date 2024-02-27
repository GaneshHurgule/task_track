<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
class UserController extends Controller
{
  public function create(){
    return view('users.create');
  } 
  public function login(Request $request){
    return view('users.login');
  }
  public function postLogin(Request $request)
{

    $validateData = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);
   

    if (Auth::attempt($validateData)) {
        // Authentication successful
        return redirect()->route('users.show', ['user' => Auth::id()]);
    } else {
        // Authentication failed
        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
    }
}

  public function store(Request $request){
    
    $validateDate = $request->validate([
        'name'=>'required',
        'email'=>'required',
        'password'=>'required|min:6',
    ]);

    $user = User::create($validateDate);
    
    $user->roles()->attach(1); // Replace '1' with the actual role ID
    return redirect()->route('users.show',['user'=>$user])->with('success',"User Get Create");
  }
  public function show(Request $request,$user_id){
    
        $user = User::with('roles')->where('id',$user_id)->first();
   return view('users.show',['user'=>$user]);
  }
  public function edit(Request $request,$user_id){
    $user = User::find($user_id);
    return view('users.edit',['user'=>$user]);
  }
  public function update(Request $request,$user_id){
    $validatedData = $request->validate([
        'name'=>'required',
        'email'=>'required',
        'password'=>'required|min:6'
    ]);
    $user = User::findOrFail($user_id); // Retrieve the user by ID
    $user->update($validatedData);

    $user->roles()->detach(1);
    $user->roles()->attach(2);
   
    return redirect()->route('users.show',['user'=>$user['id']])->with('success','user get updated');
}

  public function index(Request $request){
    $users = User::with('roles')->get();
    return view('users.index',['users'=>$users]);
  }
}
