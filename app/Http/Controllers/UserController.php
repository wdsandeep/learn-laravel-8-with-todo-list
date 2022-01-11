<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        if($request->hasFile('image')) {
            User::uploadAvatar($request->image);
            // $request->session()->flash('message', 'Image uploaded.');
            return redirect()->back()->with('message', 'Image uploaded.');
        }
        // $request->session()->flash('error', 'Image not uploaded.');
        return redirect()->back()->with('error', 'Image not uploaded.');
    }


    public function index() 
    {
        
        $data = [
            'name' => 'Elon',
            'email' => 'elon@gmail.com',
            'password' => 'password'
        ];
        // User::create($data);
        
        // $user = new User();
        // $user->name = 'Sandeep';
        // $user->email = 'wd.sandeep@gmail.com';
        // $user->password = bcrypt('pass@123');
        // $user->save();

        
         $user = User::all();
         return $user;


        // User::where('id', 2)->delete();


        // DB::insert('insert into users (name, email, password) values (?, ?, ?)', ['wdsandeep', 'wdsandeep@gmail.com','sandeep@123']);
        
        // $users = DB::select('select * from users');
        // return $users;
        
        // DB::update('update users set name = "wdsan" where id = ?', ['1']);

        // DB::delete('delete from users where id = ?', ['1']);
        return 'I am in User Controller';
    }
}
