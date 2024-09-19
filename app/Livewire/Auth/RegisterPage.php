<?php

namespace App\Livewire\Auth;


use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;


#[Title('Register')]
class RegisterPage extends Component
{
    public $name;
    public $email;
    public $password;

    //register user

    public function save(){
        $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password'=>'required|min:6|max:255',
        ]);
        //save to database
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password'=> Hash::make($this->password),

        ]);
        //login user
        auth()->login($user);

        // redirect to homepage
        return redirect()->intended();
    }
    public function render()
    {
        return view('livewire.auth.register-page');
    }
}
