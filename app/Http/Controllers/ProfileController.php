<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profile');
    }
   
    public function image(Request $request)
    {
        $imagename = $request->user_id . $_FILES['image']['name'];
        $tmpfile = $_FILES['image']['tmp_name'];
        $newfile = 'assets/img/users/' . $request->user_id . $_FILES['image']['name'];
        $result = move_uploaded_file($tmpfile, $newfile);
        $updateimage = DB::table('users')
            ->where('id', $request->user_id)
            ->update([
                'photo' => $imagename
            ]);
        return back();
    }
}
