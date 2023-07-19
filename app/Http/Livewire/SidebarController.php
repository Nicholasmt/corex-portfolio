<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SidebarController extends Component
{
    public function render()
    {
        return view('livewire.sidebar-controller');
    }

    public function dashboard()
    {
        dd('dashboard');
    }
    public function services()
    {
        dd('services');
    }
    public function portfolio()
    {
        dd('portfolio');
    }
    public function settings()
    {
        dd('settings');
    }
}
