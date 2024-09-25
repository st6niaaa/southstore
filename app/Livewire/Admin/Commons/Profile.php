<?php

namespace App\Livewire\Admin\Commons;

use Livewire\Component;
use App\Models\User;
use Sonata\GoogleAuthenticator\GoogleAuthenticator;

class Profile extends Component
{
    public string $name;
    public string $email;
    public string $secret;
    public string $qrCodeURL;
    public string $verifycode;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;

        $googleAuthenticator = new GoogleAuthenticator();
        $this->secret = $googleAuthenticator->generateSecret();
        $this->qrCodeURL = $googleAuthenticator->getURL('SouthStore', $this->email, $this->secret);
    }

    public function testFeatures()
    {
    }

    public function userEdit()
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();
        
        redirect()->route('profile');
    }

    public function verifyCode()
    {
        $googleAuthenticator = new GoogleAuthenticator();
        $isValid = $googleAuthenticator->checkCode($this->secret, $this->twofacode);
        if ($isValid) {
            $this->isOpen = false;
            $this->user->twofa_secret = $this->secret;
            $this->user->save();
    
        }
    }

    public function render()
    {
        return view('livewire.admin.commons.profile', [
            'qrCodeURL' => $this->qrCodeURL,
        ])->layout('components.layouts.admin');
    }
}
