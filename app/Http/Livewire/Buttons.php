<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Buttons extends Component
{

    public function render()
    {
        return view('livewire.buttons');
    }

    public function dash()
    {
        dd('dashboard');
    }
    public function serv()
    {
        dd('services');
    }
    public function port()
    {
        dd('portfolio');
    }
    public function set()
    {
        dd('settings');
    }
}
