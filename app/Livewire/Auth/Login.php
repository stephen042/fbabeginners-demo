<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        
        $validated = $this->validate([
            'email' => ['required', 'string', 'lowercase', 'email'],
            'password' => ['required'],
        ]);

        
        if (!Auth::attempt($validated)) {
            
            session()->flash('error', 'invalid login Details');
            return redirect('/access');

        }else{
            
            $user = User::where("email", "$this->email")->get()->first();
            
            Auth::loginUsingId($user->id);

            Session::regenerate();

            $route = ($user->role == 2) ? "admin_dashboard" : "dashboard";

            return redirect()->route($route);
        }

    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
 