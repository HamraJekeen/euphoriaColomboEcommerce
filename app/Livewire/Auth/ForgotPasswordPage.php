<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;


#[Title('Forgot Password')]
class ForgotPasswordPage extends Component
{
    public $email;


    //register user

    public function save(){
        $this->validate([
            'email' => 'required|email|max:255|exists:users,email',
            
          
        ]);

        $status = password::sendResetLink(['email' => $this->email]);

        if ($status ===password::RESET_LINK_SENT){
            session()->flash('success','Password reset link has been sent to your email address');
            $this->email ='';
        }
        //save to database
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password'=> Hash::make($this->password),

        ]);
        

      
    }
    public function render()
    {
        return view('livewire.auth.forgot-password-page');
    }
}
