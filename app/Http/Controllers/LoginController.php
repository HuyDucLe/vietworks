<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

use Session;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function login_show()
    {
        if(session()->has('name'))
            return redirect('index')->withErrors([
            'email' => 'You\'re already login',
        ]);
        return view('login');
    }
    
    public function login(Request $request)
    {
        request()->validate([
            'password' => ['required', Password::min(6)
                                        // ->letters()
                                        // ->mixedCase()
                                        // ->numbers()
                                        // ->symbols()
                                        // ->uncompromised()
                                    ],
        ]);
        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        if ($user) {
            session(['name'=> $user->name, 'role'=>$user->role, 'uid'=>$user->id]);
            if($user->role == 'Admin') return redirect('admin')->with('success', 'Đăng nhập thành công');
            else return redirect('index')->with('success', 'Đăng nhập thành công');
        } else {
            return back()->with->withErrors('fail', 'Thông tin không chính xác');
        }
    }

    public function register_show()
    {
        if(session()->has('name'))
            return redirect('index')->withErrors([
            'email' => 'You\'re already login',
        ]);
        return view('register');
    }
    
    public function register(Request $request)
    {
        request()->validate([
            'email' => ['required', 'email', 'max:255','unique:users'],
            'password' => ['required', Password::min(6)
                                        // ->letters()
                                        // ->mixedCase()
                                        // ->numbers()
                                        // ->symbols()
                                        // ->uncompromised()
                                    ],
            // 'password_confirmation' => ['required_with:password|same:password']
            'birthday' => 'nullable|date|before:today',
            'role' => ['required', 'string'],
        ]);
        $res = User::updateOrCreate(
            [
             'id' => $request->id
            ],
            [
                'name' => $request-> name,
                'sex' => $request-> sex,
                'birthday' => date("Y-m-d",strtotime($request-> birthday)),
                'phone' => $request-> phone,
                'email' => $request-> email,
                'password' => $request-> password,
                'date_join' => (is_null($request->date_join)) ? substr(Carbon::now(),0,10) : $request->date_join,
                //'avata' => ,
                'role' => (is_null($request->role)) ? 'Candidate' : $request->role,
            ]);    
            $res->save();
            if($res) 
            {
                return redirect('login'); 
            }
            return redirect()->back()->withErrors('fail', 'Thông tin không chính xác');
    }   
    
    public function logout()
    {
        auth()->logout();
        session()->flush();
        return redirect('login')->with('success', 'Đã đăng xuất');
    }
}
