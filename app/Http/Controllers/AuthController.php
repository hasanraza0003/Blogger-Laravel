<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('user.auth.register'); 
    }

    
    public function register(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'profile_pic' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'dob' => 'required',
            'bio' => 'required',
            'hobbies' => 'required|array|min:1',
        ], [
            'username.required' => 'Username is required',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'password.confirmed' => 'Passwords do not match',
            'password_confirmation.required' => 'Confirm Password is required',
            'phone.required' => 'Phone number is required',
            'gender.required' => 'Gender is required',
            'profile_pic.required' => 'Profile picture is required',
            'profile_pic.image' => 'Must be an image',
            'profile_pic.mimes' => 'Only JPG, JPEG, PNG allowed',
            'profile_pic.max' => 'Image size must be under 2MB',
            'dob.required' => 'Date of Birth is required',
            'dob.date_format' => 'Date format must be dd-mm-yyyy',
            'bio.required' => 'Bio is required',
            'hobbies.required' => 'At least one hobby is required',
            'hobbies.array' => 'Invalid hobbies format',
        ]);

    
        $user = new User();
        $user->username = $req->username;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->gender = $req->gender;

        if ($req->hasFile('profile_pic')) {
            $file = $req->file('profile_pic');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/profile_pics'), $filename);
            $user->profile_pic = 'uploads/profile_pics/' . $filename;
        }

        $user->dob = $req->dob;

    
        $user->bio = $req->bio;
        $user->hobbies = json_encode($req->hobbies);
        $user->save();

        return redirect('login')->with('success', 'Registration successful! Please log in.');
    }   

 
    public function showLogin()
    {
        return view('user.auth.login');
    }

 
    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ]);

        
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            return redirect('/'); 
        }

        return back()->with('error', 'Invalid login credentials');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('success', 'You have been logged out');
    }
}
