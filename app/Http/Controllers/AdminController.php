<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public $users;
    
    public function __construct(){
        $this->users = DB::table('users')
                ->where('role', '=', 'user')
                ->paginate(5);
    }
    public function adminPage(){
        $users = $this->users;
        $i = 1;
        return view('admin', compact('users', 'i'));
    }

    public function addUser(Request $request){
        $validate = $request->validate([
            'surname'=>'required',
            'name'=>'required',
            'phone'=>'required|unique:users|min:8|max:9',
            'location'=>'required',
            'login'=>'required|unique:users|min:5',
            'password'=>'required|min:5'
        ]);
        $user = User::create([
            'role'=>'user',
            'surname'=>$request->surname,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'location'=>$request->location,
            'login'=>$request->login,
            'password'=>Hash::make($request->password),
            'photo'=>'user.png'
        ]);
        return back();
    }

    public function updateUser(Request $request){
        $users = DB::table('users')
        ->where('id', $request->user_id)
        ->update([
            'surname'=>$request->surname,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'location'=>$request->location,
            'login'=>$request->login,
            'password'=>Hash::make($request->password)
        ]);

        return back();
    }
    public function searchUser(Request $request){
        $this->users = User::where('name', 'LIKE', '%'.$request->search.'%' )
        ->orwhere('surname', 'LIKE', '%'.$request->search.'%' )
        ->orwhere('phone', 'LIKE', '%'.$request->search.'%' )
        ->orwhere('login', 'LIKE', '%'.$request->search.'%' )
        ->paginate(5);
        return $this->adminPage();
    }
    public function deleteUser(Request $request){
        $client = DB::table('users')
        ->where('id', $request->id)
        ->delete();
        return back();
    }
}
?>