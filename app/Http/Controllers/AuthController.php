<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule\Unique;
use Illuminate\Validation\Rule\Exists;
use Illuminate\Contracts\Support\MessageProvider;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $formData=request()->validate(
            [
                'name'=>['required','max:255','min:3'],
                'email'=>['required','email',Rule::unique('users','email')],
                'username'=>['required','max:255','min:3', Rule::unique('users','username')],
                'password'=>['required','min:8','max:15'],
            ]);
        $user=User::create($formData);

        auth()->login($user);
        return redirect('/')->with('success','Welcome Dear, '.$user->name);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success','Good Bye');
    }

    public function login()
    {
        return view('auth.login');
    }

    
    public function post_login()
    {
        $formData=request()->validate([
                'email'=>['required','email','max:255',Rule::exists('users','email')],
                'password'=>['required','min:8','max:255']
            ],[
                'email.required'=>'We need your email address.',
                'password.min'=>'Password should be more than 8 characters.'
            ]);
        
        if(auth()->attempt($formData))
        {
            if(auth()->user()->is_admin)
            {
                return redirect('/admin/blogs');
            }
            return redirect('/')->with('success','Welcome Back');
        }
        else
        {
            return redirect()->back()->withErrors([
            'email'=>'User Credentials Wrong.'
            ]);
        }
    }
}
