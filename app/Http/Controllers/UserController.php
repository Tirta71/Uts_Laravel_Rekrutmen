<?php

// UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.User.User', ['users' => $users]);
    }

    public function formTambahUser(){
        return view('admin.Table.Insert.tambahUser');
    }
    public function tambahUser(Request $request)
    {
        if ($request->isMethod('post')) {
       
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|string|min:8',
            ]);
    
           
            User::create($validatedData);
    
            return redirect()->route('formTambahUser')->with('success', 'User added successfully!');
        }
    
        return view('admin.TambahUser');
    }
    
    

}
