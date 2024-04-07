<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => ['required', 'unique:users', 'regex:/^(?:\\+?8801|01)[1-9]\\d{8}$/'],
            'password' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = $request->img ? $request->img->getClientOriginalName() : 'water_lily.jpg';

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->image = 'images/' . $imageName;
        $user->save();

        if ($request->img) {
            $request->img->storeAs('public/images', $imageName);
        }

        return redirect()->route('login-page')->with('success', 'Registration was successful.');

    }

    public function edit($id){
        $user = User::find($id);

        return view('update_user',['user'=>$user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => ['required', 'unique:users,phone,' . $user->id, 'regex:/^(?:\\+?8801|01)[1-9]\\d{8}$/'],
            'password' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = $request->img ? $request->img->getClientOriginalName() : $user->image;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->image = 'images/' . $imageName;
        $user->save();

        if ($request->img) {
            $request->img->storeAs('public/images', $imageName);
        }

        return redirect()->route('user.profile')->with('success', 'User updated successfully.');
    }



}
