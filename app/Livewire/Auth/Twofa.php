<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Sonata\GoogleAuthenticator\GoogleAuthenticator;
use App\Services\NotificationService;

class Twofa extends Component
{
    public $user;
    public $email;
    public $password;
    public $remember;
    public $two_factor_secret;
    public $code = '';
    public $cooldown = false;

    protected $rules = [
        'code' => ['required'],
    ];

    public function mount()
    {
        $userData = session('userData');
        if (!$userData || !isset($userData['user']) || !isset($userData['email']) || !isset($userData['two_factor_secret']) || !isset($userData['password']) || !isset($userData['remember'])) {
            return redirect()->route('login');
        }
        $this->user = $userData['user'];
        $this->email = $userData['email'];
        $this->password = $userData['password'];
        $this->two_factor_secret = $userData['two_factor_secret'];
        $this->remember = $userData['remember'];
    }

    public function authenticate()
    {
        $this->validate();

        $user_id = $this->user;
        $googleAuthenticator = new GoogleAuthenticator();
        $isValid = $googleAuthenticator->checkCode($this->two_factor_secret, $this->code);

        if ($this->code) {
            if (!$isValid) {
                return redirect()->route('login');
            }
        } else {
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
        return view('livewire.auth.twofa')->layout('components.layouts.wapp');
    }
}
