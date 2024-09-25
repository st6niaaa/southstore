<?php

namespace App\Livewire\Admin\Commons;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Sonata\GoogleAuthenticator\GoogleAuthenticator;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Storage;

class Profile extends Component
{
    public string $name;
    public string $email;
    public string $secret;
    public string $qrCodeURL;
    public string $verifycode;
    public string $actualpassword;
    public string $newpassword;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;

        $googleAuthenticator = new GoogleAuthenticator();
        $this->secret = $googleAuthenticator->generateSecret();
        $this->qrCodeURL = $googleAuthenticator->getURL('SouthStore', $this->email, $this->secret);
    }

    public function userEdit()
    {
        $notificationService = new NotificationService();
        $user = User::findOrFail(auth()->user()->id);
        $user->name = $this->name;
        $user->email = $this->email;
        if ($user->save()) {
            $notificationService->notify("success", "Seu perfil foi editado com sucesso!", 3000);
        } else {
            $notificationService->notify("error", "Seu perfil não foi editado! Um erro foi encontrado", 3000);
        }
        
        redirect()->route('profile');
    }

    public function verifyCode()
    {
        $googleAuthenticator = new GoogleAuthenticator();
        $notificationService = new NotificationService();
        $isValid = $googleAuthenticator->checkCode($this->secret, $this->verifycode);
        if ($isValid) {
            $user = User::findOrFail(auth()->user()->id);
            $user->two_factor_secret = $this->secret;
            if ($user->save()) {
                $notificationService->notify("success", "Autenticação de dois fatores habilitada com sucesso!", 3000);
            } else {
                $notificationService->notify("error", "Autenticação de dois fatores não foi habilitada! Um erro foi encontrado", 3000);
            }
        } else {
            $notificationService->notify("error", "Código de verificação inválido!", 3000);
        }
        redirect()->route('profile');
    }

    public function removetwofa()
    {
        $googleAuthenticator = new GoogleAuthenticator();
        $notificationService = new NotificationService();
        $isValid = $googleAuthenticator->checkCode(auth()->user()->two_factor_secret, $this->verifycode);

        if ($isValid) {
            $user = User::findOrFail(auth()->user()->id);
            $user->two_factor_secret = null;
            if ($user->save()) {
                $notificationService->notify("success", "Autenticação de dois fatores removida com sucesso!", 3000);
            } else {
                $notificationService->notify("error", "Autenticação de dois fatores não foi removida! Um erro foi encontrado", 3000);
            }
        } else {
            $notificationService->notify("error", "Código de verificação inválido!", 3000);
        }
        redirect()->route('profile');
    }

    public function changePassword()
    {
        $notificationService = new NotificationService();
        $user = User::findOrFail(auth()->user()->id);
        if (password_verify($this->actualpassword, $user->password)) {
                $user->password = Hash::make($this->newpassword);
                if ($user->save()) {
                    $notificationService->notify("success", "Senha alterada com sucesso!", 3000);
                } else {
                    $notificationService->notify("error", "Senha não pôde ser alterada! Um erro foi encontrado", 3000);
                }
            } else {
                $notificationService->notify("error", "A senha atual não coincide!", 3000);
            }

        redirect()->route('profile');
    }    

    public function render()
    {
        return view('livewire.admin.commons.profile', [
            'qrCodeURL' => $this->qrCodeURL,
        ])->layout('components.layouts.admin');
    }
}
