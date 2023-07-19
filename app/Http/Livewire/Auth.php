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
        $this->valodate();

            $user = Users::where('email',$this->email)->with('role')->first();
            if($user)
            {
                if(\Hash::check($this->password,$user->password))
                {
                    session()->put('id',$user->id);
                    session()->put('email',$user->email);
                    session()->put('name',$user->name);
                    // session()->put('photo',$users_info->profile_photo);
                    session()->put('authentication',true);

                    return redirect('redirect');

                 }

                else
                {
                    return back()->with('error','Email and Password Mismatch');
                }
                    
            }
            else
            {
                return back()->with('error','Account does not Exist!');
            }
        }
    

}
