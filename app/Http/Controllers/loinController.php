<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Role;
use App\role_user;

class loinController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('test');
    }
    

    public function authuser(Request $request){
        //return Auth::attempt(['email' => $request->username, 'password' =>$request->password]);
        if (Auth::attempt(['email' => $request->username, 'password' =>$request->password])) {
       // dd(Auth::user());
              $user = Auth::user();
              return view('welcome');
            }else {
               return view('login');
            }
    }

    public function userlist(){
         $user = User::all();
    	return view('user.userlist',compact('user'));
    }

    public function create(){

            return view('user.userform');
    }

    public function store(Request $request){

      $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
       return redirect('user-list');
    }

    public function userrole($id){
      $role= Role::all();
      $roles = role_user::where('user_id',$id)->get();
      $roleId[] = '';
      foreach($roles as $roleid){
         $roleId[] = $roleid->role_id;
      }

      $username = User::where('id',$id)->first();

      return view('user.user-role-view',compact('role','username','roleId'));
    }

    public function roleuserstore(Request $request ,$id){
      
         $user = User::findOrFail($id);
     $user->syncRoles($request->role);

    return redirect()->back();
    }
}
 