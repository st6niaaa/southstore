<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $email = '';
    public $password = '';

    public $remember = false;

    protected $rules = [
        'email'    => ['required', 'email'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $this->validate();
        $user = User::where('email', $this->email)->first();

        if (!$user) {
            $this->addError('auth', trans('auth.failed'));
            return;
        }
        
        if (!Hash::check($this->password, $user->password)) {
            $this->addError('auth', trans('auth.failed'));
            return;
        }
    
        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('auth', trans('auth.failed'));
            return;
        }
    
        return redirect()->intended(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('components.layouts.wapp');
    }
}
