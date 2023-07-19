<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Auth extends Component
{

    public $password,$email;

    protected $rules = [
        'email' => 'required',
        'password' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.auth');
    }

        public function auth()
        {
            $this->validate();

            $user = User::where('email',$this->email)->first();
            if($user)
            {
                if(\Hash::check($this->password,$user->password))
                {
                    session()->put('id',$user->id);
                    session()->put('email',$user->email);
                    session()->put('name',$user->name);
                    session()->put('privilege',$user->role_id);
                    session()->put('authentication',true);

                    return redirect('redirect');

                    // session()->flash('success','Success');
                    

                 }

                else
                {
                    session()->flash('error','Email and Password Mismatch!');
                }
                    
            }
            else
            {
                session()->flash('error','User does not exist!');
            }

            $this->emit('alert_remove');
        }

    

}
